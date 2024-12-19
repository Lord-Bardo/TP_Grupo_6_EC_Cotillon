<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Ramsey\Uuid\v1;
use App\Models\User;
use App\Models\Producto;

class UserController extends Controller
{

    public function r_view_login()
    {
        return view('user-log.login');
    }

    public function register(Request $request) {
        $datos = $request->validate([
            "register_username" => ['required', 'unique:usuarios,username', 'min:3', 'max:255'], 
            "register_password" => ['required', 'confirmed', 'min:6'], 
        ], [
            "register_username.required" => "El nombre de usuario es obligatorio.",
            "register_username.unique" => "Este nombre de usuario ya está en uso.",
            "register_username.min" => "El nombre de usuario debe tener al menos 3 caracteres.",
            "register_username.max" => "El nombre de usuario no puede exceder los 255 caracteres.",
            "register_password.required" => "La contraseña es obligatoria.",
            "register_password.confirmed" => "Las contraseñas no coinciden.",
            "register_password.min" => "La contraseña debe tener al menos 6 caracteres.",
        ]);

        // Encriptar la contraseña usando bcrypt
        $datos["register_password"] = bcrypt($datos["register_password"]);

        // Crear el nuevo usuario en la base de datos
        User::create([
            'username' => $datos['register_username'],
            'password' => $datos['register_password'],
            'role' => 'user',
        ]);

        // Redirigir al login con un mensaje de éxito
        return redirect()->route('user-log.r_view_login')->with("success", "Registro exitoso. Ahora puedes iniciar sesión.");
    }

    public function r_view_register()
    {
        return view ('user-log.register');
    }

    public function authenticate(Request $request) {
        $datos = $request->validate([
            'login_username' => 'required|string',  
            'login_password' => 'required|string',  
        ]);

        if (auth()->attempt(['username' => $datos['login_username'], 'password' => $datos['login_password']])) {
            // Salio OK!
            return redirect()->route('welcome');
        } else {
            // Malio sal!
            return back()->withErrors([
                'login_error' => 'Nombre de usuario o contraseña incorrectos.',
            ])->withInput();  // Conservar los datos ingresados (No funciona!)
        }
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('welcome'); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
