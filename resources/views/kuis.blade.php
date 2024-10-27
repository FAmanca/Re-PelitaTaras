@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="{{ route('srq.submit') }}" method="post">
            @csrf
            <div class="head text-center ">
                <h1>Self Reporting Questionnaire <span>(SRQ-29)</span></h1>
                <hr>
            </div>
            <div class="srq">
                @foreach ($kuis as $k)
                    <div class="soal mt-5">
                        <div class="options">
                            <p class="kuis">{{ $k['nomor'] }}. {{ $k['soal'] }}</p>
                            <select name="question{{ $k['nomor'] }}" id="pilihan{{ $k['nomor'] }}"
                                class="opsi form-select" >
                                <option value="" disabled selected>Pilih</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-success my-5" style="width: 100%;">Kirim Tes</button>
            </div>

        </form>
    </div>
@endsection
