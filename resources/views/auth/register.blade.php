<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            {{-- <div class="mt-4">
                <x-label for="email" value="{{ __('Kelas') }}" />
                <x-input id="kelas" class="block mt-1 w-full" type="text" name="kelas" :value="old('kelas')" required autocomplete="kelas" />
            </div> --}}
            <div class="mt-4">
                <div class="mt-4">
                    <x-label for="kelas" value="{{ __('kelas') }}" />
                    <select id="kelas" name="kelas"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required onchange="updateJurusan()">
                        <option value="">Pilih Kelas</option>
                        @foreach (config('kelas') as $k => $jurusan)
                            <option value="{{ $k }}">{{ $k }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="kelas" value="{{ __('kelas') }}" />
                    <select id="jurusan" name="jurusan"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required onchange="updateSubKelas()">
                        <option value="">Pilih Jurusan</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="kelas" value="{{ __('kelas') }}" />
                    <select id="sub_kelas" name="sub_kelas"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        required>
                        <option value="">Pilih Sub-Kelas</option>
                    </select>
                </div>

            </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
            <input type="hidden" name="combined" id="combined" value="a">
        </form>
        <script>
            // Objek classes diisi dari konfigurasi PHP
            const classes = @json(config('kelas'));

            let combined = document.getElementById("combined").values

            function combineValues(event) {
                event.preventDefault(); // Mencegah pengiriman form otomatis
                const kelas = document.getElementById("kelas").value;
                const jurusan = document.getElementById("jurusan").value;
                const subKelas = document.getElementById("sub_kelas").value;

                // Gabungkan nilai
                const combinedValue = `${kelas}-${jurusan}-${subKelas}`;
                combined.value = combinedValue;

                // Kirim form
                event.target.submit();
            }

            function updateJurusan() {
                const selectedKelas = document.getElementById("kelas").value;
                const jurusanDropdown = document.getElementById("jurusan");
                jurusanDropdown.innerHTML = '<option value="">Pilih Jurusan</option>';

                if (classes[selectedKelas]) {
                    Object.keys(classes[selectedKelas]).forEach(jurusan => {
                        const option = new Option(jurusan, jurusan);
                        jurusanDropdown.add(option);
                    });
                }
                document.getElementById("sub_kelas").innerHTML = '<option value="">Pilih Sub-Kelas</option>';
            }

            function updateSubKelas() {
                const selectedKelas = document.getElementById("kelas").value;
                const selectedJurusan = document.getElementById("jurusan").value;
                const subKelasDropdown = document.getElementById("sub_kelas");
                subKelasDropdown.innerHTML = '<option value="">Pilih Sub-Kelas</option>';

                if (classes[selectedKelas] && classes[selectedKelas][selectedJurusan]) {
                    classes[selectedKelas][selectedJurusan].forEach(subKelas => {
                        const option = new Option(subKelas, subKelas);
                        subKelasDropdown.add(option);
                    });
                }
            }
        </script>


    </x-authentication-card>
</x-guest-layout>
