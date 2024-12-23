@include('user-log.header-log-in')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3 bg-light rounded p-5 shadow-lg">
            <h2 class="text-center text-dark mb-4">Registrarse</h2>

            <form action="{{ route('user-log.register') }}" method="POST">
                @csrf
                
                <!-- Nombre de Usuario -->
                <div class="form-group">
                    <label for="register_username" class="text-dark">Nombre de Usuario</label>
                    <input type="text" name="register_username" id="register_username" class="form-control" placeholder="Elige un nombre de usuario" required value="{{ old('register_username') }}">
                    @error('register_username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="register_password" class="text-dark">Contraseña</label>
                    <input type="password" name="register_password" id="register_password" class="form-control" placeholder="Crea una contraseña" required>
                    @error('register_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="register_password_confirmation" class="text-dark">Confirmar Contraseña</label>
                    <input type="password" name="register_password_confirmation" id="register_password_confirmation" class="form-control" placeholder="Confirma tu contraseña" required>
                    @error('register_password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de Registro -->
                <button type="submit" class="btn btn-dark btn-block mt-4">Registrarse</button>

                <!-- Enlace a Login -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿Ya tienes cuenta? <a href="{{ route('user-log.r_view_login') }}" class="text-info">Inicia sesión aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

@include ('user-log.footer-log-in')
