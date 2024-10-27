<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'combined' => 'required|string',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $sub = $input['sub_kelas'];

        // $parts = [$kelas, $jurusan, $sub];
        // $combined = implode('-', $parts);


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'kelas' => $sub, // Simpan gabungan nilai kelas
            'password' => Hash::make($input['password']),
        ]);
    }
}
