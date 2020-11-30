<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <style>
        header,
        main,
        footer {
            padding-left: 300px;
        }

        body {
            margin: 0px;
            padding: 0px;
        }

        .top-nav {
            padding-right: 300px;
        }

        .container-filtro {
            width: 100%;
            background-color: whitesmoke;
            padding-left: 15px;
            padding-right: 15px;
        }

        .filtro {
            margin: 10px 0px;
        }

        .filtro label {
            color: black;
            font-size: medium;
            padding-left: 10px;
        }

        .logo {
            padding-top: 30px;
        }

        .logo a {
            margin: 0 auto;
            height: 100% !important;
            width: 200px !important;
            margin-bottom: 30px;
        }

        .logo img {
            width: 100%;
        }

        #search {
            font-size: 16px;
            width: 80% !important;
        }

        .input-field {
            margin-left: 30px;
        }

        .label-icon {
            right: 10px;
        }

        ul .f:hover {
            transition: background-color 0.5s;
            background-color: gainsboro;
            cursor: pointer !important;
        }

        ul .f {
            font-weight: bold;
        }

        .container-product {
            margin-top: 20px;
            display: inline-block;
            flex-wrap: wrap;
            padding: 10px !important;
        }

        .container-product a {
            text-decoration: none;
            color: black;
        }

        .container-product * {
            margin: 0px;
        }

        .container-product img {
            width: 100%;
            border-radius: 5px;
        }

        .precio {
            font-weight: bold;
        }

        .browser-default * {
            font-weight: bold;
        }

        table th,
        table td {
            padding-left: 20px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="top-nav">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="index.html" class="brand-logo">Roupalia</a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="login.html">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="side-nav left fixed">
            <li class="logo">
                <a id="logo-container" href="" class="brand-logo">
                    <img src="../img/logo.png" alt="Logo">
                </a>
            </li>
            <li class="f pantalones"><a onclick="">Usuarios</a></li>
            <li class="f pantalones"><a onclick="">Pedidos</a></li>
            <li class="f pantalones"><a onclick="">Productos</a></li>
            <li class="f pantalones"><a onclick="">Proveedores</a></li>
            <li class="f pantalones"><a onclick="">Transportistas</a></li>
        </ul>
    </header>
    <main>
        <div class="container-filtro">
            <div class="container">
                <div class="row">
                    <div class="filtro col s12 m4">
                        <label>Ordenar</label>
                        <select class="browser-default">
                            <option value="" selected></option>
                            <option value="1">De mayor a menor (&gt;)</option>
                            <option value="2">De menor a mayor (&lt;)</option>
                        </select>
                    </div>
                    <div class="filtro col s12 m3">
                        <label>Sexo</label>
                        <select class="browser-default">
                            <option value="" selected></option>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                        </select>
                    </div>
                    <div class="filtro col s12 m2">
                        <label>Talla</label>
                        <select class="browser-default">
                            <option value="" selected></option>
                            <option value="1">XS</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="1">XL</option>
                            <option value="2">XXL</option>
                            <option value="3">3XL</option>
                            <option value="3">4XL</option>
                        </select>
                    </div>
                    <div class="filtro col s12 m3">
                        <label>Marca</label>
                        <select class="browser-default">
                            <option value="" selected></option>
                            <option value="1">Pier One</option>
                            <option value="2">Adidas</option>
                            <option value="3">Decathlon</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Ordenar precio, talla, marca  -->
        </div>
        <div class="container">
            <div class="row">
                <div class="tabla col s12 m12">
                    <table class="striped highlight centered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alvin</td>
                                <td>Eclair</td>
                                <td>$0.87</td>
                            </tr>
                            <tr>
                                <td>Alan</td>
                                <td>Jellybean</td>
                                <td>$3.76</td>
                            </tr>
                            <tr>
                                <td>Jonathan</td>
                                <td>Lollipop</td>
                                <td>$7.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>