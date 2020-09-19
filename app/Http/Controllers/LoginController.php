<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
class LoginController extends Controller
{
    public function login(Request $request){



          if(Auth::attempt([
              'email' => $request->email,
              'password' => $request->password
          ]))
          {
              $user = User::where('email',$request->email)->first();
               $superadmin =   User::role('superadmin')->first();

              if( $user->name == $superadmin->name ){
                return redirect()->route('admin');
              }
              else{
                return redirect(RouteServiceProvider::HOME);
              }

          }
          return redirect()->back();
    }
}
