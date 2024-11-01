<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title')->get();
        return view('posts', [
            "title" => "Posts",
            "posts" => $posts
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post', compact('post'));
    }

    public function kelola()
    {
        $posts = Post::orderBy('title')->get();
        return view('admin/kelolapost', [
            'posts' => $posts
        ]);
    }
    public function create()
    {
        $posts = Post::orderBy('title')->get();
        return view('admin/createpost', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'ringkas' => 'required|string|min:10',
            'body' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        $judul = $validatedData['judul'];
        $author = $validatedData['author'];
        $excerpt = $validatedData['ringkas'];
        $body = $validatedData['body'];
        $slug = strtolower(str_replace(" ", "-", $judul));

        $postingan = new Post();
        $postingan->title = $judul;
        $postingan->author = $author;
        $postingan->excerpt = $excerpt;
        $postingan->body = $body;
        $postingan->slug = $slug;
        $postingan->publish_at = Carbon::now('Asia/Jakarta');

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan gambar di storage/app/public/images
            $postingan->image_path = $imagePath; // Simpan path gambar di database
        }

        $postingan->save();

        return redirect('/kelolapost')->with('success', 'Postingan berhasil dibuat.');
    }



    public function delete($id)
    {
        $post = Post::findOrFail($id);

        // Hapus gambar dari penyimpanan
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect('/kelolapost')->with('success', 'Postingan berhasil dihapus.');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin/editpost', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'ringkas' => 'required|string|min:10',
            'body' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        // Retrieve the existing post
        $postingan = Post::findOrFail($id);

        // Update the post fields with validated data
        $postingan->title = $validatedData['judul'];
        $postingan->author = $validatedData['author'];
        $postingan->excerpt = $validatedData['ringkas'];
        $postingan->body = $validatedData['body'];
        $postingan->slug = strtolower(str_replace(" ", "-", $validatedData['judul']));
        $postingan->publish_at = Carbon::now('Asia/Jakarta');

        // Proses upload gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($postingan->image_path) {
                Storage::disk('public')->delete($postingan->image_path);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images', 'public');
            $postingan->image_path = $imagePath; // Simpan path gambar di database
        }

        $postingan->save();

        return redirect('/kelolapost')->with('success', 'Postingan berhasil diperbarui.');
    }
}
