<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;
use Session;

class AccountController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function Settings()
  {
    return view('account.settings');
  }

  public function showprofile()
  {
    return view('account.profile');
  }
  
  public function showchangePassword()
  {
    return view('account.changePassword');
  }
  
  public function changePassword(Request $request)
  {

    $current_password = $request->current_password;
    $password =  $request->password;
    // The passwords matches
    if (!(Hash::check($current_password , Auth::user()->password))) {
      Session::flash("error","Your current password does not matches with the password you provided. Please try again.");
      return redirect()->back();
    }
    //Current password and new password are same
    if(strcmp($current_password , $password ) == 0){
      Session::flash("error","New Password cannot be same as your current password. Please choose a different password.");
      return redirect()->back();
    }

    $validatedData = $request->validate([
      'current_password' => 'required',
      'password' => 'required|string|min:6|confirmed',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($password);
    $user->save();
    Session::flash("success","The password  has been changed  successfully !");
    return redirect()->route('account.profile');

  }
}
