@include('user-log.header-log-in')

<main id="mainContainer" class="container">
    <div id="loginCard" class="row">
        <div id="cardLeft" class="col-6">
            <div id="imageCover">
                <img src="{{ asset('images/register.png') }}" alt="Set New Password Image" id="decorativeImage">
            </div>
        </div>
        <div id="cardRight" class="col-6">
            <h1 id="titleLogin">EC-Cotillon</h1>
            <h2 id="welcomeText">Establece tu nueva contraseña</h2>

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

            <form action="{{ route('user-log.set_new_password', $usuario->id_usuario) }}" method="POST" id="setNewPasswordForm">
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
                <button type="submit" id="boton" class="btn btn-dark btn-block mt-4">Establecer Contraseña</button>

                <!-- Enlace a Login -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿Ya tienes cuenta? <a href="#" class="text-info">Inicia sesión aquí</a></p>
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
    #inputGroupPassword, #inputGroupConfirmPassword {
        margin-bottom: 20px;
    }

    #labelPassword, #labelConfirmPassword {
        font-weight: bold;
        color: #333;
        display: block;
    }

    #password, #confirm_password {
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
