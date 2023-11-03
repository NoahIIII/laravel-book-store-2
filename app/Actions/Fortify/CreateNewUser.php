<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'fname' => ['required', 'string', 'max:25','min:3'],
            'lname' => ['required', 'string', 'max:25','min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required','max:24','min:8'],
        ])->validate();

        return User::create([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'username' => $input['fname'].$input['lname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
