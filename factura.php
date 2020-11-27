<!DOCTYPE html>
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
            background-color: whitesmoke;
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

        .final {
            background-color: white;
            margin-top: 50px;
            padding: 50px 0px !important;
        }

        .final .titulo {
            text-align: center;
            font-size: x-large;
            font-weight: bold;
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

        .input-field input::placeholder {
            color: gray;
        }

        .input-field input:hover,
        .input-field input:focus {
            border: 1px solid black !important;
            box-shadow: 0 0 0 2px black !important;
        }

        .boton {
            padding-left: 0.75em !important;
        }

        .radio {
            margin: 10px 0px;
        }

        .metodo_pago label {
            color: black;
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
                    <p class="titulo col s12 m12">Factura</p>
                    <div class="input-field col s12 m4">
                        <input placeholder="Nombre*" id="nombre" name="nombre" type="text" required>
                    </div>
                    <div class="input-field col s12 m8">
                        <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos*" required>
                    </div>
                    <div class="input-field col s12 m12">
                        <input id="direccion" name="direccion" type="text" placeholder="Dirección*" required>
                    </div>
                    <div class="input-field col s12 m4">
                        <input id="cod_postal" name="cod_postal" type="number" placeholder="Código postal*" required>
                    </div>
                    <div class="input-field col s12 m4">
                        <input id="ciudad" name="ciudad" type="text" placeholder="Ciudad*" required>
                    </div>
                    <div class="input-field col s12 m4">
                        <input id="provincia" name="provincia" type="text" placeholder="Provincia*" required>
                    </div>
                    <div class="input-field col s12 m12">
                        <input id="pais" name="pais" type="text" placeholder="País*" required>
                    </div>
                    <div class="metodo_pago">
                        <p class="col s12 m12">Método de pago</p>
                        <div class="radio col s12 m12">
                            <input type="radio" id="contrareembolso" name="metodo_pago">
                            <label for="contrareembolso">Contra reembolso</label>
                        </div>
                        <div class="radio col s12 m4">
                            <input type="radio" id="tarjeta" name="metodo_pago">
                            <label for="tarjeta">Tarjeta</label>
                        </div>
                        <div class="input-field col s12 m8">
                            <input id="pais" name="pais" type="text" placeholder="Número Tarjeta" required>
                        </div>
                    </div>
                    <div class="boton">
                        <button class="btn white lighten-1 black-text" type="submit" name="submit">Comprar</button>
                    </div>
                </form>
                <div class="final col s12 m12">
                    <div class="titulo">Gracias por confiar en nosotros</div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>