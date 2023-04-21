<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Acceso a todos los valores del formulario
        // dd($request);
        // Acceso de manera individual a los valores del formulario
        // dd($request->get('username'));

        // Modificamos el request, sobreescribiendo el valor de username con la validacion de tipo slug
        $request->request->add(['username' => Str::slug( $request->username )]);

        // Validacion
        $this->validate($request, [
            'name' => 'required|min:5',
            'username' => 'required|max:15|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed'
        ]);

        // Creamos el INSERT a la base de datos en la tabla users
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password ),
        ]);

        // Autenticar
        auth()->attempt($request->only('email','password')); 

        // Redireccionar
        return redirect()->route('posts.index');
    }

}