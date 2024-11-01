@extends('layouts.main')

@section('content')
<div class="post">
    <h1>{{ $post->title }}</h1>
    <p><strong>Oleh: {{ $post->author }}</strong></p>
    <div class="post-body">
        {!! $post->body !!}
    </div>
</div>
@endsection
