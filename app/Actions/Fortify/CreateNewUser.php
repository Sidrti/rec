<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\user_detail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();



        $CreateUser = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'pan_number' => $input['pan_number'],
            'password' => Hash::make($input['password']),
        ]);
        $last_id = $CreateUser->id;

        $user_detail = new user_detail();
        $user_detail->pan_number = $input['pan_number'];
        $user_detail->gst_number = $input['gst_number'];
        $user_detail->address = $input['address'];
        $user_detail->city = $input['city'];
        $user_detail->pincode = $input['pincode'];
        $user_detail->user_id = $last_id;
        
        $user_detail->save(); 

        return $CreateUser;
    }
}
