@extends('admin.layouts.mainadmin')
@section('admin')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        });
    </script>
    <div class="card">
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Tambah Postingan Baru</h3>
                </div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="input mb-3">
                            <label for="judul">Judul Postingan</label>
                            <input type="text" class="form-control" id="judul" placeholder="Masukan Judul Postingan"
                                name="judul" />
                        </div>
                        <div class="input mb-3">
                            <label for="author">Pembuat</label>
                            <input type="text" class="form-control" id="author" placeholder="Masukan Nama Pembuat"
                                name="author" />
                        </div>
                        <div class="input mb-3">
                            <label for="formFile" class="form-label">Thumbnail</label>
                            <input class="form-control" type="file" id="formFile" name="image" accept="image/*" />
                        </div>
                        <div class="input mb-3">
                            <label for="ringkas">Ringkasan</label>
                            <input type="text" class="form-control" id="ringkas"
                                placeholder="Masukan Ringkasan Postingan" name="ringkas" />
                        </div>
                        <div class="input mb-3">
                            <label for="judul">Isi Postingan</label>
                            <textarea name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info w-100">Buat Postingan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
