<?php
// Práctica 8
namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signupForm() {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request) {
        $user = new User();
        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->nickname = $request->get('nickname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('loginForm')->with('success','Registro exitoso, inicia sesión.');
    }

    public function loginForm() {
        if (Auth::viaRemember()) {
            return redirect()->route('user')->with('success','Bienvenido de nuevo.');
        } else if (Auth::check())  {
            return redirect()->route('user');
        } else {
            return view('auth.login')->with('error','No se ha podido iniciar sesión.');
        }
    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');
        $remember = $request->has('remember'); // Verifies if the checkbox is checked

        if (Auth::guard('web')->attempt($credentials,$remember)) {
            $request->session()->regenerate();
            return redirect()->route('user')->with('success','Inicio de sesión exitoso');
        } else {
            $error = 'Error al acceder a la aplicación';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
