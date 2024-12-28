<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Recuperar contraseña</h2>
        </div>
        <div class="email-body">
            <p><strong>Código de verificación:</strong> {{ $codigo }}</p>
        </div>
        <div class="footer">
            <p>Este mensaje fue enviado desde Ec-Cotillón. Si no lo reconoces, por favor ignóralo.</p>
        </div>
    </div>
</body>
</html>