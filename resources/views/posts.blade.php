@extends('layouts.main')

@section('content')
    <section id="blog" class="content-section">
        <div class="section-heading">
            <h1>Pelita<br><em>Posts</em></h1>
            <p>Postingan Mengenai Kesehatan Mental.
                <br>Oleh Tim Pelita Taras
            </p>
        </div>
        <div class="section-content">
            <div class="tabs-content">
                <div class="wrapper">
                    {{-- <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                        <li><a href="#tab1" class="active">July 2018</a></li>
                        <li><a href="#tab2">June 2018</a></li>
                        <li><a href="#tab3">May 2018</a></li>
                        <li><a href="#tab4">April 2018</a></li>
                    </ul> --}}
                    <div class="row">
                        <section id="first-tab-group" class="tabgroup">
                            <div id="tab1">
                                <ul>
                                    @foreach ($posts as $post)
                                        <li class="posts col-12">
                                            <div class="item">
                                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="max-width: 306px; max-height: 230px; width: auto; height: auto;">

                                                <div class="text-content">
                                                    <h4>{{ $post->title }}</h4>
                                                    <span>{{ $post->publish_at }}</span>
                                                    <p>{{ $post->excerpt }}.
                                                </p>

                                                    <div class="accent-button button">
                                                        <a href="{{ route('posts.show', $post->slug) }}">Lihat Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
