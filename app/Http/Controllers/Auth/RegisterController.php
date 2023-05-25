<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Models\Profile;
use App\Models\Renter;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

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
            'name'     => 'required|string|max:255',
            'phone'  => 'required|string|max:255|unique:renters',
            'cinsiyet' => 'string|max:50',
            'adres'    => 'string|max:250',
            'yas'      => 'integer|max:50',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $renter = Renter::create([
            'name'    => $data['name'],
            'phone' => $data['phone'],
        ]);
        $user = User::create([
            'id'       => $renter->id,
            'cinsiyet' => $data['cinsiyet'],
            'adres'    => $data['adres'],
            'yas'      => $data['yas'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        if ($user->count() == 0) {
            $renter->delete($renter);
        }
        return $user;
    }
}
