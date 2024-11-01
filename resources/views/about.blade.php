@extends('layouts.main')

@section('content')
    <section id="contact" class="content-section">
        <div id="map">

            <!-- How to change your own map point
                       1. Go to Google Maps
                       2. Click on your location point
                       3. Click "Share" and choose "Embed map" tab
                       4. Copy only URL and paste it within the src="" field below
                -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.00062464909!2d107.5557551750782!3d-6.890527093108526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6bd6aaaaaab%3A0xf843088e2b5bf838!2sSMK%20Negeri%2011%20Bandung!5e0!3m2!1sen!2sid!4v1729865837870!5m2!1sen!2sid"
                width="100%" height="400px" style="border:0;" allowfullscreen></iframe>
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
        </div>
        <div class="hero">
            <img src="{{ asset('img/Gurure.jpeg') }}" class="img-fluid" alt="...">
        </div>
        <div id="contact-content">
            <div class="section-heading">
                <h1>Guru BK <br><em>Sebelas</em></h1>
                <p>Yuk Kenalan Dengan Guru BK
                    <br>Kami Dari SMKN 11 Bandung
                </p>

            </div>

            {{-- GURU --}}
            <div class="container mt-4" style="background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 0.25rem;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/chadengle.jpg') }}" alt="Nama Gambar" class="img-fluid"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col text-start">
                        <h3 class="mb-0">Nama Guru</h3>
                        <p class="text-muted mb-0">Deskripsi Guru.</p>
                    </div>
                </div>
            </div>
            {{-- GURU --}}
            {{-- GURU --}}
            <div class="container mt-4" style="background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 0.25rem;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/chadengle.jpg') }}" alt="Nama Gambar" class="img-fluid"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col text-start">
                        <h3 class="mb-0">Nama Guru</h3>
                        <p class="text-muted mb-0">Deskripsi Guru.</p>
                    </div>
                </div>
            </div>
            {{-- GURU --}}
            {{-- GURU --}}
            <div class="container mt-4" style="background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 0.25rem;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/chadengle.jpg') }}" alt="Nama Gambar" class="img-fluid"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col text-start">
                        <h3 class="mb-0">Nama Guru</h3>
                        <p class="text-muted mb-0">Deskripsi Guru.</p>
                    </div>
                </div>
            </div>
            {{-- GURU --}}
            {{-- GURU --}}
            <div class="container mt-4" style="background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 0.25rem;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/chadengle.jpg') }}" alt="Nama Gambar" class="img-fluid"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col text-start">
                        <h3 class="mb-0">Nama Guru</h3>
                        <p class="text-muted mb-0">Deskripsi Guru.</p>
                    </div>
                </div>
            </div>
            {{-- GURU --}}
            {{-- GURU --}}
            <div class="container mt-4" style="background-color: #f0f0f0; border: 1px solid #ccc; border-radius: 0.25rem;">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/chadengle.jpg') }}" alt="Nama Gambar" class="img-fluid"
                            style="width: 200px; height: 200px; object-fit: cover;">
                    </div>
                    <div class="col text-start">
                        <h3 class="mb-0">Nama Guru</h3>
                        <p class="text-muted mb-0">Deskripsi Guru.</p>
                    </div>
                </div>
            </div>
            {{-- GURU --}}



        </div>
    </section>
@endsection
