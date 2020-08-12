<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class UserController extends Controller
{
   
    public function register(Request $request) {

        request()->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'cpassword'=>'required'
        ]);    
        $email=$request->input('email');
        if ($request->input('cpassword')== $request->input('password')) {
            $exists= DB::select("SELECT * FROM users WHERE email ='$email'");
            if(empty($exists)){
                User::create([
                    'name' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
                    ]);
                $credenciales = $request->only('email','password');
                if (Auth::attempt($credenciales)) {
                    $res = array("auth" => true);
                } else {
                    $res = array("auth" => false);
                }
            }else{
                $res= 'userexists';
            }
                         
          }else{
              $res= 'passdontmatch';
          }
          return json_encode($res);            
            
    }

    public function login(Request $request) {
        $credenciales = $request->only('email','password');
        if (Auth::attempt($credenciales)) {
            $res = array("auth" => true);
        } else {
            $res = array("auth" => false);
        }
        return json_encode($res);
    }

    public function logout(Request $request) {
        Auth::logout();
        $res = array("logout" => true);
        return json_encode($res);
    }

}
