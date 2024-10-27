@extends('layouts.main')

@section('content')
    <section id="contact" class="content-section">
        <main class="ai">
            <div class="head">
                <h1 class="tengah">Yume | AI</h1>
                <h6 class="tengah">Konsultasi Dengan AI</h6>
            </div>
            <hr>
            @if (isset($response))
                <p class="user" id="userMessage">{{ $user }}<strong> : User</strong></p>
                <br>
                <p class="yume" id="typingEffect"><strong>Yume :</strong> </p>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Typing effect
                        let responseText = {!! json_encode($response, JSON_PRETTY_PRINT) !!};
                        let element = document.getElementById("typingEffect");
                        let text = JSON.stringify(responseText, null, 2);
                        let index = 0;

                        function typeEffect() {
                            if (index < text.length) {
                                element.innerHTML += text.charAt(index);
                                index++;
                                setTimeout(typeEffect, 30);
                            }
                        }

                        typeEffect();
                    });
                </script>
            @endif
            <div class="col-md-6 container fixed-bottom">
                <form action="{{ url('/ai') }}" method="post" class="input-group mb-3">
                    @csrf
                    <input id="content" class="form-control form-control-lg" name="content"
                        placeholder="Tulis pesan Anda di sini...">
                    <button type="submit" class="">Kirim</button>
                </form>
                <p id="pesan">Yume masih dalam pengembangan.</p>
            </div>
            <script>
                // Input value to user mess age
                const input = document.getElementById('content');
                const userMessage = document.getElementById('userMessage');

                // Update the <p class="user"> when the input field value changes
                input.addEventListener("input", function() {
                    userMessage.textContent = input.value;
                });
                console.log(input.value);
            </script>

        </main>
    </section>
@endsection
