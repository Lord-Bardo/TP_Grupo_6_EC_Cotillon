@include('user-log.header-log-in')

<main class="mainContainer container">
    <div class="loginCard row">
        <div class="cardLeft col-6 d-sm-block d-none">
            <div class="imageCover">
                <img src="{{ asset('images/register.png') }}" alt="Set New Password Image" class="decorativeImage">
            </div>
        </div>
        <div class="cardRight col-sm-6 col-12">
            <h1 class="titleLogin">EC-Cotillon</h1>
            <h2 class="welcomeText">Establece tu nueva contraseña</h2>

            <!-- Mensaje -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->has('password_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('password_error') }}
                </div>
            @endif

            <form action="{{ route('user-log.set_new_password', $usuario->id_usuario) }}" method="POST">
                @csrf

                <!-- Nueva Contraseña -->
                <div id="inputGroupPassword">
                    <label for="password" id="labelPassword">Nueva Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Ingresa tu nueva contraseña" autocomplete="new-password">

                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div id="inputGroupConfirmPassword">
                    <label for="password_confirmation" id="labelConfirmPassword">Confirmar Contraseña</label>
                    <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirma tu nueva contraseña" autocomplete="new-password">

                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de Establecer Contraseña -->
                <button type="submit" id="boton" class="btn btn-block mt-4">Establecer Contraseña</button>

                <!-- Enlace a Login -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿Ya tienes cuenta? <a href="{{ route('user-log.r_view_login_remake') }}" class="text-info">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<style>
</style>

@include ('user-log.footer-log-in')