<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Ramsey\Uuid\v1;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Producto;

class UserController extends Controller
{

    public function r_view_login()
    {
        return view('user-log.login');
    }

    public function r_view_login_remake()
    {
        return view('user-log.login-remake');
    }

    public function r_view_register()
    {
        return view ('user-log.register');
    }

    public function r_view_register_remake()
    {
        return view('user-log.register-remake');
    }

    public function olvidar_contrasena()
    {
        return view('user-log.olvidar-contrasena');
    }

    public function restaurar_password(Request $request) {
        // Validar los datos del formulario
        $data = $request->validate([
            'reset_username' => 'required|string|max:255'
        ], [
            "required" => "Este campo es obligatorio!"
        ]);

        $usuario = User::where('username', $data['reset_username'])->first();

        if(!$usuario) {
            return back()->withErrors([
                'reset_error' => 'No se encontró un usuario con ese nombre.'
            ])->withInput();
        }

        $codigo_unico = Str::random(6);  /* Podriamos poner otra funcion */

        // Enviar el correo
        Mail::send('user-log.email-reset-password', ['codigo' => $codigo_unico], function ($user) use ($usuario) {
            $user->to($usuario->email)
                    ->subject('Recuperar contraseña');
        });

        // Redirigir con un mensaje de éxito
        return redirect(route('user-log.codigo-verificacion', ['codigo' => $codigo_unico]))->with('success', 'Gracias por contactarnos. Te responderemos pronto.'); 
    }

    public function verificar_codigo($codigo) {
        return view('user-log.codigo-verificacion', ['codigo' => $codigo]);
    }

    public function register(Request $request) {
        $datos = $request->validate([
            "register_username" => ['required', 'unique:usuarios,username', 'min:3', 'max:255'], 
            "register_password" => ['required', 'confirmed', 'min:6', 'max:255'],
            "register_email" => ['required', 'email', 'max:255']
        ], [
            "register_username.required" => "El nombre de usuario es obligatorio.",
            "register_username.unique" => "Este nombre de usuario ya está en uso.",
            "register_username.min" => "El nombre de usuario debe tener al menos 3 caracteres.",
            "register_username.max" => "El nombre de usuario no puede exceder los 255 caracteres.",
            "register_password.required" => "La contraseña es obligatoria.",
            "register_password.confirmed" => "Las contraseñas no coinciden.",
            "register_password.min" => "La contraseña debe tener al menos 6 caracteres.",
            "register_password.max" => "La contraseña no puede exceder los 255 caracteres.",
            "register_email.required" => "El nombre de usuario es obligatorio.",
            "email" => "Se debe utilizar un correo válido!",
            "register_email.max" => "El email no puede exceder los 255 caracteres."
        ]);

        // Encriptar la contraseña usando bcrypt
        $datos["register_password"] = bcrypt($datos["register_password"]);

        // Crear el nuevo usuario en la base de datos
        User::create([
            'username' => $datos['register_username'],
            'password' => $datos['register_password'],
            'role' => 'user',
            'email' => $datos['register_email']
        ]);

        // Redirigir al login con un mensaje de éxito
        return redirect()->route('user-log.r_view_login_remake')->with("success", "Registro exitoso. Ahora puedes iniciar sesión.");
    }

    public function authenticate(Request $request) {
        $datos = $request->validate([
            'login_username' => 'required|string',  
            'login_password' => 'required|string',  
        ], [
            "required" => "Este campo es obligatorio!"
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
}
