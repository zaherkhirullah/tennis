<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Models\Kiralayan;
use App\Http\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'isim' => 'required|string|max:255',
            'telefon' => 'required|string|max:255|unique:kiralayans',
            'cinsiyet'  =>'string|max:50',
            'adres' =>'string|max:250',
            'yas'   =>'integer|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $kiralayan  =  Kiralayan::create([
            'isim'       =>  $data['isim'],
            'telefon'    =>  $data['telefon'],
        ]);
        $user = User::create([ 
            'id'         => $kiralayan->id,          
            'cinsiyet'   =>  $data['cinsiyet'],
            'adres'      =>  $data['adres'],
            'yas'        =>  $data['yas'],
            'email'      =>  $data['email'],
            'password'      => bcrypt($data['password']),
        ]);    
        if($user->count()==0)
            $kiralayan->delete($kiralayan);
        return $user;
    }
}
