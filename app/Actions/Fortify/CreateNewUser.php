<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\SMSController;
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
            'phone'=>['required',
            'string',
            'max:15',
            Rule::unique(User::class),],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required','max:24','min:8'],
        ])->validate();
            $sms=new SMSController();
            $sms->sendVerification($input['phone']);
            redirect()->to(route('request.verify'));
        return User::create([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'username' => $input['fname'].$input['lname'],
            'phone'=>$input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }


}
