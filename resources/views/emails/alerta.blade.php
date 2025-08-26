<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alerta de la Universidad Los Libertadores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #004A98;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $messageContent['title'] }}</h1>
    </div>

    <div class="content">
        <p>Estimado/a {{ $messageContent['egresado']->nombre }} {{ $messageContent['egresado']->apellido }},</p>
        
        <p>{{ $messageContent['message'] }}</p>
        
        <p>Atentamente,<br>
        Oficina de Egresados<br>
        Universidad Los Libertadores</p>
    </div>

    <div class="footer">
        <p>Este es un mensaje automático, por favor no responda a este correo.</p>
        <p>Universidad Los Libertadores - Todos los derechos reservados</p>
    </div>
</body>
</html>