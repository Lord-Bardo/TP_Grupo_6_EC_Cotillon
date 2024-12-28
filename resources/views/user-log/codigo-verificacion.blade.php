@include ('user-log.header-log-in')

<main id="mainContainer" class="container">
    <div id="loginCard" class="row">
        <div id="cardLeft" class="col-6">
            <div id="imageCover">
                <img src="{{ asset('images/register.png') }}" alt="Verification Code Image" id="decorativeImage">
            </div>
        </div>
        <div id="cardRight" class="col-6">
            <h1 id="titleLogin">EC-Cotillon</h1>
            <h2 id="welcomeText">Ingresa el código de verificación</h2>

            <!-- Mensaje -->
            @if (session('success_reenviar'))
                <div class="alert alert-success">
                    {{ session('success_reenviar') }}
                </div>
            @else
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->has('code_error'))
                    <div class="alert alert-danger">
                        {{ $errors->first('code_error') }}
                    </div>
                @endif
            @endif
            

            <form action="{{ route('user-log.verificar_codigo', $usuario->id_usuario) }}" method="POST" id="verifyCodeForm">
                @csrf

                <!-- Código de Verificación -->
                <div id="inputGroupCode">
                    <label for="verification_code" id="labelCode">Código de Verificación</label>
                    <input type="text" id="verification_code" name="verification_code" placeholder="Ingresa el código de verificación">

                    @error('verification_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de Verificación -->
                <button type="submit" id="boton" class="btn btn-block mt-4">Verificar Código</button>

                <!-- Enlace a Login -->
                <div class="mt-3 text-center">
                    <p class="text-dark">¿No recibiste el código? <a href="{{ route('user-log.reenviar_codigo', ['usuario' => $usuario->id_usuario]) }}" class="text-info">Reenviar el código</a></p>
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
        color: #333;
        display: block;
    }

    #verification_code {
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
