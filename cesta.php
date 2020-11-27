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

        .container-product,
        .container-pago {
            background-color: white;
            margin-top: 40px;
            padding: 15px !important;
            margin-bottom: 40px;
        }

        .container-img {

            margin-top: 30px;
            
        }

        .container-pago .row {
            margin-top: 25px;
        }

        .row .txt-dinero {
            margin-left: 15px;
            float: left;
        }

        .row .dinero {
            margin-right: 15px;
            float: right;
        }

        .row .total {
            font-weight: bold;
            font-size: medium;
        }

        .container-pago {
            margin-left: 8.33% !important;
        }

        .container-pago hr {
            border: 1px solid gainsboro;
        }

        .container-pago a,
        button {
            width: 100%;
            font-weight: bold;
            background-color: white;
            color: black;
            border: 3px solid black;
            padding: 5px !important;
            border-radius: 0px !important;
            text-align: center;
        }

        .container-pago a:hover,
        button:hover {
            transition: background-color, color 0.8s;
            background-color: black !important;
            color: white !important;
            opacity: 0.8;
        }

        .container-product img {
            width: 100%;
            border-radius: 5px;
        }

        .product {
            margin: 20px 0px;
        }

        .precio {
            font-weight: bold;
        }

        .titulo {
            font-weight: bold;
            font-size: x-large;
        }

        .container-select label {
            color: gray;
            font-size: medium;
        }

        .container-select select {
            box-shadow: 0 0 0 1px black;
            border-radius: 0px;
        }

        .container-select select:hover, select:focus{
            outline: none;
            box-shadow: 0 0 0 2px black;
        }

        .container-select {
            margin-top: 40px !important;
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
                            <li><a href="productos.html">Productos</a></li>
                            <li><a href="login.html">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="productos col s12 m12">
                    <div class="container-product col s12 m7">
                        <div class="titulo col s12 m12">Mi cesta (X artículos)</div>
                        <div class="product col s12 m12">
                            <div class="container-img col s12 m3">
                                <a href="#" class="materialboxed">
                                    <img src="img/pantalon.jpg" alt="Foto">
                                </a>
                            </div>
                            <div class="container-info col s12 m6">
                                <p class="marca">TOM TAILOR</p>
                                <p class="producto">Pantalón Gris</p>
                                <p class="precio">22,99 €</p>
                                <div class="container-buttons">
                                    <button onclick="quitar(this)">Eliminar</button>
                                </div>
                            </div>
                            <div class="container-select col s12 m3">
                                <label>Cantidad</label>
                                <select class="browser-default">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="product col s12 m12">
                            <div class="container-img col s12 m3">
                                <a href="#" class="materialboxed">
                                    <img src="img/pantalon.jpg" alt="Foto">
                                </a>
                            </div>
                            <div class="container-info col s12 m6">
                                <p class="marca">TOM TAILOR</p>
                                <p class="producto">Pantalón Gris</p>
                                <p class="precio">22,99 €</p>
                                <div class="container-buttons">
                                    <button onclick="quitar(this)">Eliminar</button>
                                </div>
                            </div>
                            <div class="container-select col s12 m3">
                                <label>Cantidad</label>
                                <select class="browser-default">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="product col s12 m12">
                            <div class="container-img col s12 m3">
                                <a href="#" class="materialboxed">
                                    <img src="img/pantalon.jpg" alt="Foto">
                                </a>
                            </div>
                            <div class="container-info col s12 m6">
                                <p class="marca">TOM TAILOR</p>
                                <p class="producto">Pantalón Gris</p>
                                <p class="precio">22,99 €</p>
                                <div class="container-buttons">
                                    <button onclick="quitar(this)">Eliminar</button>
                                </div>
                            </div>
                            <div class="container-select col s12 m3">
                                <label>Cantidad</label>
                                <select class="browser-default">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="container-pago col s12 m4">
                        <div class="titulo">Total del pedido</div>
                        <div class="row">
                            <div class="txt-dinero">Subtotal</div>
                            <div class="dinero">10 €</div>
                        </div>
                        <div class="row">
                            <div class="txt-dinero">Envío</div>
                            <div class="dinero">Gratis</div>
                        </div>
                        <hr>
                        <div class="row total">
                            <div class="txt-dinero">Total (IVA incluido)</div>
                            <div class="dinero">12€</div>
                        </div>
                        <a href="factura.html" class="col s12 m12">COMENZAR PEDIDO</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>