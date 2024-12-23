@include('user-log.header-log-in')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-6 offset-md-3 bg-light rounded p-5 shadow-lg">
            <h2 class="text-center text-dark mb-4">Iniciar sesión</h2>

            <!-- Mensaje -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if ($errors->has('login_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('login_error') }}
                </div>
            @endif

            <form action="{{ route('user-log.authenticate') }}" method="POST"> 
                @csrf
                <!-- Nombre de Usuario -->
                <div class="form-group">
                    <label for="login_username" class="text-dark">Nombre de Usuario</label>
                    <input type="text" name="login_username" id="login_username" class="form-control" placeholder="Introduce tu nombre de usuario" required>
                </div>
            
                <!-- Contraseña -->
                <div class="form-group">
                    <label for="login_password" class="text-dark">Contraseña</label>
                    <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Introduce tu contraseña" required>
                </div>
                
                <!-- Botón de Login -->
                <button type="submit" class="btn btn-dark btn-block mt-4">Iniciar sesión</button>
            
                <!-- Enlace a Registro -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿No tienes cuenta? <a href="{{ route('user-log.r_view_register') }}" class="text-info">Regístrate aquí</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

@include ('user-log.footer-log-in')

