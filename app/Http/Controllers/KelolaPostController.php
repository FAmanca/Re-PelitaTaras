<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class KelolaPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('title')->get();
        return view('kelolapost', [
            "title" => "Kelola Post",
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('editpost', [
            "title" => "Edit Post",
            "post" => $post
        ]);
    }

    public function create()
    {
        return view('createpost');
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $description = $request->body;

        $dom = new DOMDocument();
        @$dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if ($img instanceof \DOMElement) {
                $src = $img->getAttribute('src');

                if (strpos($src, 'data:image') === 0) {
                    // Decode base64 string
                    $data = explode(',', $src);
                    $image_data = base64_decode($data[1]);

                    // Determine file name
                    $image_name = "/upload/" . time() . $key . '.png';
                    $path = public_path() . $image_name;

                    // Save image file
                    file_put_contents($path, $image_data);

                    // Replace the src attribute of the img tag
                    $img->setAttribute('src', $image_name);
                }
            }
        }

        $description = $dom->saveHTML();

        $post = new Post($validatedData);
        $post->body = $description;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Postingan Berhasil Ditambahkan');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('posts.index')->with('error', 'Terjadi kesalahan. Mohon coba lagi nanti.');
    }
}


public function update(Request $request, Post $post)
{
    try {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $description = $request->body;

        $dom = new DOMDocument();
        @$dom->loadHTML($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if ($img instanceof \DOMElement) {
                $src = $img->getAttribute('src');

                if (strpos($src, 'data:image') === 0) {
                    // Decode base64 string
                    $data = explode(',', $src);
                    $image_data = base64_decode($data[1]);

                    // Determine file name
                    $image_name = "/upload/" . time() . $key . '.png';
                    $path = public_path() . $image_name;

                    // Save image file
                    file_put_contents($path, $image_data);

                    // Replace the src attribute of the img tag
                    $img->setAttribute('src', $image_name);
                }
            }
        }

        $description = $dom->saveHTML();

        // Update the post with validated data
        $post->fill($validatedData);
        $post->body = $description;
        $post->save();

        return redirect('/kelolapost')->with('success', 'Postingan berhasil diperbarui.');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->route('posts.index')->with('error', 'Terjadi kesalahan. Mohon coba lagi nanti.');
    }
}


    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();

            return Redirect::to('/kelolapost')->with('success', 'Postingan Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Terjadi kesalahan. Mohon coba lagi nanti.');
        }
    }
}
