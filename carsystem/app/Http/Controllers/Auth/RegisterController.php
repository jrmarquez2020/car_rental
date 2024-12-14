<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'license_number' => ['required', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:15'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'license_photo' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Store the license photo in the 'public/licenses' directory
        $licensePhotoPath = $data['license_photo']->store('licenses', 'public');

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'license_number' => $data['license_number'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
            'license_photo' => $licensePhotoPath,
        ]);
    }
}
