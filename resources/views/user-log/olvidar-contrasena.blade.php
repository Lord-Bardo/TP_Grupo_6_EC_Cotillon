@include ('user-log.header-log-in')

<main id="mainContainer" class="container">
    <div id="loginCard" class="row">
        <div id="cardLeft" class="col-6">
            <div id="imageCover">
                <img src="{{ asset('images/register.png') }}" alt="Password Reset Image" id="decorativeImage">
            </div>
        </div>
        <div id="cardRight" class="col-6">
            <h1 id="titleLogin">EC-Cotillon</h1>
            <h2 id="welcomeText">Recupera tu contraseña</h2>

            <!-- Mensaje -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->has('reset_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('reset_error') }}
                </div>
            @endif

            <form action="{{ route('user-log.restaurar_password') }}" method="POST" id="resetPasswordForm">
                @csrf
                <div id="inputGroupUsername">
                        <label for="reset_username" id="labelUsername">Username</label>
                        <input type="text" id="reset_username" name="reset_username" placeholder="Ingrese un usuario">

                        @error('reset_username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                <!-- Botón de Recuperación -->
                <button type="submit" id="boton" class="btn btn-block mt-4">Recuperar Contraseña</button>

                <!-- Enlace a Login -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿Ya recordas tu contraseña? <a href="{{ route('user-log.r_view_login_remake') }}" class="text-info">Inicia sesión aquí</a></p>
                </div>

            </form>
        </div>
    </div>
</main>

<style>
</style>
