<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  public function get_login()
  {
      return view("backend.login");
  }
  public function post_login(LoginRequest $request)
  {
    $email = $request->email;
    $password = $request->password;
    //  $credentials = $r->only('email', 'password');
    //  print_r($credentials);
   // print_r(Auth::attempt(['email' => $email, 'password' => $password]));
    if(Auth::attempt(['email' => $email, 'password' => $password]))
     {
        //chuyen huong
        return redirect('admin');

     }
     else {
       return redirect('login')->with('thongbao','tk,mk khong chinh xac'); //tao session key=thongbao , value=
     }

   }

   public function Logout()
   {
      Auth::logout();
     return redirect('login');
   }

}
