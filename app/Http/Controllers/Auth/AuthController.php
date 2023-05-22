<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRootRequest;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.Admin.login');
    }


    public function authenticate(AuthRootRequest $request){

        $credentials = $request->only('email', 'password');
        $area_id = Area::where('nombre', 'LIKE', "%ADMIN%")->first();

        $credentials['ida'] = $area_id->ida;

        if (Auth::guard('root')->attempt($credentials)) {
            return redirect()->intended('/bienvenida');
        }else{
            return redirect()->route('login')->with('message', 'Credenciales de Acceso Incorrectas');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
