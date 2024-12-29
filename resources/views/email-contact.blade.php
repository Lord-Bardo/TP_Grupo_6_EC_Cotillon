<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
    <!-- Incluir css -->
    <link rel="stylesheet" href="{{ asset('css/email.css') }}">

</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Nuevo mensaje de contacto</h2>
        </div>
        <div class="email-body">
            <p><strong>Nombre:</strong> {{ $nombre }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>  {{ $mensaje }}</p>
        </div>
        <div class="footer">
            <p>Este mensaje fue enviado desde tu página web. Si no lo reconoces, por favor ignóralo.</p>
        </div>
    </div>
</body>
</html>
