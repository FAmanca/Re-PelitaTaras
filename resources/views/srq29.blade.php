@extends('layouts.main')

@section('content')
<div class="container">
    <div class="head text-center">
        <h1>Self Reporting Questionnaire <span>(SRQ-29)</span></h1>
        <h2 class="instructions-title">Petunjuk</h2>
        <p class="instructions-text">
            Bacalah petunjuk ini seluruhnya sebelum mulai mengisi. Pertanyaan berikut berhubungan dengan masalah yang mungkin mengganggu Anda selama 30 hari terakhir. Apabila Anda menganggap pertanyaan itu Anda alami dalam 30 hari terakhir, pilih opsi Ya dan sebaliknya, jika tidak, pilihlah opsi tidak. Jawaban Anda bersifat rahasia dan hanya untuk pemecahan masalah Anda.
        </p>
        <a href="/srq29" class="start-btn-container" style="text-decoration: none">
            <button class="btn btn-success start-btn">Mulai Mengerjakan</button>
        </a>
    </div>
</div>
@endsection
