@include ('user-log.header-log-in')

    <main id="mainContainer" class="container">
        <div id="loginCard" class="row">
            <div id="cardLeft" class="col-6">
                <div id="imageCover">
                    <img src="{{ asset('images/login-r2.png') }}" alt="Decorative Furniture Image" id="decorativeImage">
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

                        <a href="{{ route('user-log.olvidar_contrasena') }}" id="forgotPassword" class="text-info">Olvidaste tu contraseña?</a>
                    </div>

                    <div id="createAccount" class="d-flex align-items-center justify-content-center">
                        <p id="accountText">No tenes cuenta? <a href="{{ route('user-log.r_view_register_remake') }}" id="registerLink" class="text-info">Registrate</a></p>
                    </div>
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
        #inputGroupUsername, #inputGroupPassword {
            margin-bottom: 20px;
        }
    
        #labelUsername, #labelPassword {
            font-weight: bold;
            color: #333;
            display: block;
        }
    
        #username, #password {
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
            color: #fff;
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
            margin-left: 15px;
        }
    
        /* Create account section */
        #accountText {
            font-size: 16px;
            color: #555;
        }
    
        #registerLink {
            color: #7cbdfa;
        }
        
    </style>
    
      
