<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    //
    public function register(Request $request) {
        try {
            $user = User::create([
                'name' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            $res = array("msj" => "Registrado correctamente");
        } catch (Exception $e) {
            \Log::debug('Error: ' . $e);
        }

        
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

    public function getUser(Request $request) {
        if (Auth::check()) {
            $res = array("auth" => true, "user" => Auth::user());
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
