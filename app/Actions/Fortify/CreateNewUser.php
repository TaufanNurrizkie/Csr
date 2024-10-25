<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Mitra; // Pastikan model Mitra sudah di-import
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        // Cek apakah email ada di tabel mitras
        $mitra = Mitra::where('email', $input['email'])->first();

        if (!$mitra) {
            throw ValidationException::withMessages([
                'email' => ['Email tidak terdaftar di sistem.'],
            ]);
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'g-recaptcha-response' => 'recaptcha',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input, $mitra) {
            // Buat User
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            // Tautkan ID pengguna ke mitra
            $mitra->user_id = $user->id; // Mengasumsikan ada kolom user_id di tabel mitras
            $mitra->status = 'Aktif'; // Ubah status mitra menjadi aktif
            $mitra->save();

            // Assign role ke user
            $this->createRole($user);

            return $user;
        });
    }

    protected function createRole(User $user)
    {
        $user->assignRole('mitra');
    }
}
