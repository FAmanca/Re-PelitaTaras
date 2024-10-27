@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="head text-center ">
            <h1>Self Reporting Questionnaire <span>(SRQ-29)</span></h1>

            <hr>
            <div class="srq">
                <h2>Hasil Tes Self Reporting Questionnaire <span>(SRQ-29)</span></h2>
                <h4>Tanggal : {{ $tanggalWaktu }}</h4>
                <div class="res">
                    <h3>Data Pengisi</h3>
                    <p>Nama : {{ Auth::user()->name }}</p>
                    <p>Kelas : {{ Auth::user()->kelas }}</p>
                    <hr>
                    <h3>Indikasi Gangguan</h3>
                    <div class="indikasi">
                        <p>Depresi : <span class="result-value">{{ $depression ? 'Ya' : 'Tidak' }}</span> </p>
                    </div>
                    <div class="indikasi">
                        <p>Narkoba : <span class="result-value">{{ $substanceAbuse ? 'Ya' : 'Tidak' }}</span></p>
                    </div>
                    <div class="indikasi">
                        <p>Gangguan Psikotik : <span class="result-value">{{ $psychoticDisorder ? 'Ya' : 'Tidak' }}</span>
                        </p>
                    </div>
                    <div class="indikasi">
                        <p>Gangguan PTSD : <span class="result-value">{{ $ptsd ? 'Ya' : 'Tidak' }}</span></p>
                    </div>
                    <hr>
                    {{-- <h3>Pesan</h3>
                    <h5 style="margin: 10px">{{ $pesan }}</h5> --}}
                        <a href="{{ route('srq.print') }}" target="_blank">
                            <button class="btn btn-primary my-3" style="width: 100%;">Unduh Hasil PDF</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
@endsection
