<!DOCTYPE html>
<?php
session_start();
$_SESSION['cesta'] = array();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        .logo {
            padding-top: 30px;
        }

        .logo a {
            margin: 0 auto;
            height: 100% !important;
            width: 200px !important;
        }

        .logo img {
            width: 100%;
        }

        button {
            width: 100%;
            font-weight: bold;
            box-shadow: 0 0 0 2px black !important;
            border-radius: 0px !important;
        }

        form button:hover {
            background-color: black !important;
            color: white !important;
            opacity: 0.9;
        }

        .formulario {
            width: 500px;
        }

        .row form {
            margin: 50px auto 30px;
            padding-top: 5px;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 15px;
        }

        form p {
            font-weight: bold;
            font-size: medium;
        }

        form .titulo {
            font-size: x-large;
        }

        .input-field {
            margin: 0px auto;
            width: 100%;
            padding-right: 10px;
        }

        .input-field input {
            border: none !important;
            box-shadow: 0 0 0 1px black !important;
            padding-left: 10px !important;
        }

        .input-field input:hover,
        .input-field input:focus {
            border: 1px solid black !important;
            box-shadow: 0 0 0 2px black !important;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="top-nav">

                <div class="container">
                    <div class="row">
                        <div class="nav-wrapper col s12 m12">
                            <a href="index.html" class="brand-logo">Roupalia</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <form class="formulario" name="login" id="login">
                    <p class="titulo">Bienvenido</p>
                    <div class="input-field">
                        <input placeholder="Correo Electrónico*" id="correo" name="correo" type="email" required>
                    </div>
                    <div class="input-field">
                        <input id="password" name="password" type="password" placeholder="Contraseña*" required>
                    </div>
                    <button class="btn black lighten-1" type="iniciar" name="iniciar">Iniciar sesión</button>
                    <button class="btn white lighten-1 black-text" type="submit" name="submit">Iniciar sesión</button>
                </form>
                <hr>
                <form class="formulario" name="register" id="register">
                    <p class="titulo">Soy nuevo/a</p>
                    <div class="input-field">
                        <input placeholder="Nombre de Usuario*" id="username" name="username" type="text" required>
                    </div>
                    <div class="input-field">
                        <input placeholder="Correo Electrónico*" id="correo" name="correo" type="email" required>
                    </div>
                    <div class="input-field">
                        <input placeholder="Teléfono (opcional)" id="tlf" name="tlf" type="tel">
                    </div>
                    <div class="input-field">
                        <input placeholder="Contraseña*" id="password" name="password" type="password" required>
                    </div>
                    <p>Al crear una cuenta, aceptas los <a href="#">términos y condiciones</a> y <a href="#">la política
                            de privacidad</a></p>
                    <button class="btn black lighten-1" type="submit" name="registro">Registrarse</button>
                    <button class="btn white lighten-1 black-text" type="submit" name="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>