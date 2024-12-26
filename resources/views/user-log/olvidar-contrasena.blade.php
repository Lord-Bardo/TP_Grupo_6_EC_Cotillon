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
    :root {
        --primary-color: #b3e5fc; /* Celeste */
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

    /* Title of the form */
    #titleLogin {
        font-family: 'Poppins', sans-serif;
        font-size: 48px;
        color: var(--secondary-color);
        text-align: center;
        margin-bottom: 20px;
    }

    /* Subtitle */
    #welcomeText {
        font-size: 18px;
        text-align: center;
        color: #313131;
        margin-bottom: 30px;
    }

    /* Input groups */
    #inputGroupUsername, #inputGroupCode {
        margin-bottom: 20px;
    }

    #labelUsername, #labelCode {
        font-weight: bold;
        display: block;
    }

    #reset_username, #reset_code {
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
        justify-content: center;
        align-items: center;
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
