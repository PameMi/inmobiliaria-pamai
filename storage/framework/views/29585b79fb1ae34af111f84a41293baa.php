<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acceso Inmobiliaria PAMAI</title>
</head>
<body style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 40px;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;">
        <!-- Encabezado -->
        <tr>
            <td bgcolor="#153e6b" style="padding: 30px; text-align: center;">
                <h1 style="color: #ffffff; margin: 0; text-uppercase: true; letter-spacing: 2px; font-size: 24px;">INMOBILIARIA PAMAI</h1>
            </td>
        </tr>
        <!-- Cuerpo -->
        <tr>
            <td style="padding: 40px; text-align: center; color: #333333;">
                <h2 style="margin-top: 0; font-size: 20px;">¡Hola!</h2>
                <p style="font-size: 16px; line-height: 1.6; color: #666666;">
                    Recibiste este correo porque solicitaste ingresar o registrarte en nuestra plataforma de inmuebles. No necesitas contraseña; solo da clic en el botón de abajo.
                </p>
                <p style="font-size: 14px; color: #e63946; font-weight: bold; margin-bottom: 30px;">
                    Este enlace vencerá en 15 minutos por seguridad.
                </p>
                <!-- Botón -->
                <a href="<?php echo e($url); ?>" style="background-color: #153e6b; color: #ffffff; padding: 14px 35px; text-decoration: none; font-weight: bold; border-radius: 50px; display: inline-block; box-shadow: 0 4px 10px rgba(21,62,107,0.3); font-size: 16px;">
                    Continuar con el acceso
                </a>
            </td>
        </tr>
        <!-- Pie de página -->
        <tr>
            <td style="padding: 20px; background-color: #f8f9fa; text-align: center; font-size: 12px; color: #999999;">
                Si tú no solicitaste este acceso, puedes ignorar este mensaje tranquilamente.
            </td>
        </tr>
    </table>
</body>
</html><?php /**PATH D:\PROYECTOFINAL\inmobiliaria-pamai\resources\views/emails/magic-link.blade.php ENDPATH**/ ?>