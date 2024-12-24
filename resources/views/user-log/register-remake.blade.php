@include ('user-log.header-log-in')

    <main id="mainContainer" class="container">
        <div id="loginCard" class="row">
            <div id="cardLeft" class="col-6">
                <div id="imageCover">
                    <img src="{{ asset('images/register.png') }}" alt="Decorative Furniture Image" id="decorativeImage">
                </div>
            </div>
            <div id="cardRight" class="col-6">
                <h1 id="titleLogin">EC-Cotillon</h1>
                <h2 id="welcomeText">Bienvenido a EC-COTILLON</h2>

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

                <form action="{{ route('user-log.register_remake') }}" method="POST" id="registerForm">
                    @csrf

                    <!-- Nombre de Usuario -->
                    <div id="inputGroupUsername">
                        <label for="register_username" id="labelUsername">Nombre de Usuario</label>
                        <input type="text" name="register_username" id="register_username" placeholder="Elige un nombre de usuario" value="{{ old('register_username') }}">

                        @error('register_username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- Contraseña -->
                    <div id="inputGroupPassword">
                        <label for="register_password" id="labelPassword">Contraseña</label>
                        <input type="password" name="register_password" id="register_password" placeholder="Crea una contraseña">

                        @error('register_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- Confirmar Contraseña -->
                    <div id="inputGroupConfirmPassword">
                        <label for="register_password_confirmation" id="labelConfirmPassword">Confirmar Contraseña</label>
                        <input type="password" name="register_password_confirmation" id="register_password_confirmation" placeholder="Confirma tu contraseña">

                        @error('register_password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <!-- Botón de Registro -->
                    <button type="submit" id="boton" class="btn btn-dark btn-block mt-4">Registrarse</button>

                    <!-- Enlace a Login -->
                    <div class="mt-3 text-center">
                        <p class="text-dark">¿Ya tienes cuenta? <a href="{{ route('user-log.r_view_login_remake') }}" class="text-info">Inicia sesión aquí</a></p>
                    </div>

                <!-- ====================================================================== -->

                </form>
            </div>
        </div>
    </main>

    <style>
        :root {
            --primary-color: #b3e5fc; /* Celeste */
            /*--secondary-color: #f5b0e7; /* Rosa */
            --secondary-color: #f0cede; /* Rosa */
            
        }
        
        body {
            background: linear-gradient(to bottom, #ffffff, var(--secondary-color)); /* Fondo claro a azul pastel */
        }

        /* Main container */
        #mainContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 992px;
            padding: 20px;
        }
    
        /* Login Card */
        #loginCard {
            display: flex;
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
    
        /* Left side of the card */
        #cardLeft {
            width: 50%;
        }
    
        /* Image cover */
        #imageCover {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        #decorativeImage {
            width: 80%;
            height: auto;
        }
    
        /* Right side of the card */
        #cardRight {
            width: 50%;
            padding: 40px;
        }
    
        /* Title of the login form */
        #titleLogin {
            font-family: 'Poppins', sans-serif;
            font-size: 48px;
            color: var(--secondary-color);
            text-align: center;
            margin-bottom: 20px;
           
            /*background-color: rgba(231, 231, 231, 0.5); /* Fondo negro translúcido */
        }
    
        /* Subtitle */
        #welcomeText {
            font-size: 18px;
            text-align: center;
            color: #313131;
            margin-bottom: 30px;
        }
    
        /* Input groups */
        #inputGroupUsername, #inputGroupPassword, #inputGroupConfirmPassword {
            margin-bottom: 20px;
        }
    
        #labelUsername, #labelPassword, #labelConfirmPassword {
            font-weight: bold;
            color: #333;
            display: block;
        }
    
        #register_username, #register_password, #register_password_confirmation {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }
    
        /* Actions */
        #actions {
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: center; /* Centra ambos elementos */
            align-items: center; /* Alinea verticalmente */
        }

        .btn {
            background-color: #fad2e6; /* Color pastel rosa */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            margin-right: 25px; /* Aumentar el espacio entre el botón y el enlace */
        }
    
        .btn:hover {
            background-color: #f0dae5;
            transform: scale(1.05);
        }
    
        .btn:active {
            background-color: #f8c6df;
            transform: scale(1);
        }
    
        /* Forgot password link */
        #forgotPassword {
            display: inline-block;
            color: #7cbdfa;
            text-decoration: none;
            margin-left: 15px;
        }
    
        /* Create account section */
        #accountText {
            font-size: 16px;
            color: #555;
        }
    
        #registerLink {
            color: #7cbdfa;
            text-decoration: none;
        }
        
    </style>