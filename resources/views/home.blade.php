@extends('layouts.main')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="img-fill" style="background-image: url('{{ asset('img/slide_1.jpg') }}');">
                    <div class="info text-white d-flex align-items-center justify-content-end" style="height: 100vh; padding: 0 50px;">
                        <div>
                            <h1><b>Re:</b>Pelita Taras<br>SMKN 11 Bandung</h1>
                            <p>Peduli Lindungi Kesehatan Mental Sebelas</p>
                            <p>informasi dan konsultasi kesehatan mental</p>
                            <a href="/posts" class="btn btn-light">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="img-fill" style="background-image: url('{{ asset('img/slide_2.jpg') }}');">
                    <div class="info text-white d-flex align-items-center justify-content-end" style="height: 100vh; padding: 0 50px;">
                        <div>
                            <h1>Lorem ipsum <br>dolor</h1>
                            <p>Phasellus luctus odio eget dui imperdiet, at pulvinar ante convallis.</p>
                            <a href="/posts" class="btn btn-light">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="img-fill" style="background-image: url('{{ asset('img/slide_3.jpg') }}');">
                    <div class="info text-white d-flex align-items-center justify-content-end" style="height: 100vh; padding: 0 50px;">
                        <div>
                            <h1>Suspendisse suscipit<br>nulla sed</h1>
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed at massa turpis.</p>
                            <a href="/posts" class="btn btn-light">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
