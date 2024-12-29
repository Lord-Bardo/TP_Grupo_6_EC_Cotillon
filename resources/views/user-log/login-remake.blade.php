@include ('user-log.header-log-in')

    <main class="mainContainer container">
        <div class="loginCard row">
            <div class="cardLeft col-6 d-sm-block d-none">
                <div class="imageCover">
                    <img src="{{ asset('images/login-r2.png') }}" alt="Decorative Furniture Image" class="decorativeImage">
                </div>
            </div>
            <div class="cardRight col-sm-6 col-12">
                <h1 class="titleLogin">EC-Cotillon</h1>
                <h2 class="welcomeText">Bienvenido a EC-COTILLON</h2>

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

                <form action="{{ route('user-log.authenticate') }}" method="POST" id="loginForm">
                    <!-- Input group for username or email -->
                    <div id="inputGroupUsername">
                        <label for="login_username_or_email" id="labelUsername">Usuario o email</label>
                        <input type="text" id="username" name="login_username_or_email" placeholder="Ingrese un usuario">

                        @error('login_username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input group for password -->

                    <div id="inputGroupPassword">
                        <label for="login_password" id="labelPassword">Contraseña</label>
                        <input type="password" id="password" name="login_password" placeholder="Ingrese una constraseña">

                        @error('login_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div id="actions" class="mb-3">
                        @csrf

                        <button type="submit" id="boton" class="btn">Ingresá</button>

                        <a href="{{ route('user-log.olvidar_contrasena') }}" class="forgotPassword text-info">Olvidaste tu contraseña?</a>
                    </div>

                    {{-- el justify me centra el registrate --}}

                    <div class="createAccount d-flex justify-content-center">
                        <p class="accountText">No tenes cuenta? <a href="{{ route('user-log.r_view_register_remake') }}" class="registerLink text-info">Registrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

@include ('user-log.footer-log-in')

