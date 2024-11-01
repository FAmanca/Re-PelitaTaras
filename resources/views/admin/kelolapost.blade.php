@extends('admin.layouts.mainadmin')
@section('admin')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">Kelola Postingan</div>
        </div>
        <div class="card-body">
            <div class="page-inner">
                <a href="{{ route('posts.create') }}"><button class="btn btn-info mb-3">Tambah Postingan Baru</button></a>
                <br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Judul Postingan</th>
                            <th scope="col">Author</th>
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->publish_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="{{ route('posts.edit', $post->id) }}" method="POST" class="me-2">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>
                                        <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
