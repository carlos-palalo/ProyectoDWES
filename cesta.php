<!DOCTYPE html>
<html>
<?php
try {
    session_start();
    require "conexion.php";
    $subtotal = 0;
    $total = 0;
    $articulos = 0;
    $cad = 'SELECT * FROM producto WHERE id_producto IN (';
    $where_cont = 0;
    foreach ($_SESSION['cesta'] as $producto) {
        foreach ($producto as $key => $value) {
            if ($key == "id") {
                if ($where_cont == 0) {
                    $cad .= $value;
                    $where_cont++;
                } else {
                    $cad .= ', ' . $value;
                }
            }
        }
    }
    $cad .= ')';
    $productos = $bd->prepare($cad);
} catch (Exception $e) {
    echo "<script>console.log('" . $e . "')</script>";
}
?>

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
            margin-top: 20px;
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

        .container-select select:hover,
        select:focus {
            outline: none;
            box-shadow: 0 0 0 2px black;
        }

        .container-select {
            margin-top: 40px !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        function cambiar() {
            var cantidad = document.getElementsByTagName("select");
            var productos = document.getElementsByClassName("product");
            alert(productos.item(1).children[1].children[3].attributes.getNamedItem("value").value);
            var numArticulos = 0,
                subtotal = 0,
                total = 0;
            for (var i = 0; i < cantidad.length; i++) {
                numArticulos += cantidad[i].options.selectedIndex + 1;
            }
            document.getElementById("articulos").innerText = "Mi cesta (" + numArticulos + " artículos)";
        }
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
                        <?php
                        try {
                            foreach ($_SESSION['cesta'] as $producto) {
                                $articulos += $producto['cantidad'];
                            }
                            echo '<div id="articulos" class="titulo col s12 m12">Mi cesta (' . $articulos . ' artículos)</div>';
                            $productos->execute();
                            while ($fila = $productos->fetch(PDO::FETCH_OBJ)) {
                                echo '
                                <div class="product col s12 m12">
                                    <div class="container-img col s12 m3">
                                        <img src="img/pantalon.jpg" alt="Foto">
                                    </div>
                                    <div class="container-info col s12 m6">
                                        <p class="marca">' . $fila->marca . '</p>
                                        <p class="producto">' . $fila->nombre . '</p>
                                        ';

                                if ($fila->sexo == "H") {
                                    echo '<p class="genero">Hombre -- ' . $fila->talla . '</p>';
                                } else {
                                    echo '<p class="genero">Mujer -- ' . $fila->talla . '</p>';
                                }

                                echo '
                                        <p class="precio" value="' . $fila->pvp . '">' . $fila->pvp . ' €</p>
                                        <form method="POST" name="btn">
                                            <input type="hidden" name="product_id" value="' . $fila->id_producto . '">
                                            <button class="btn white black-text lighten-1" type="submit" name="btn-eliminar">Eliminar</button>
                                        </form>
                                    </div>
                                    <div class="container-select col s12 m3">
                                        <label>Cantidad</label>
                                        <select class="browser-default" onchange="cambiar()">';

                                for ($i = 1; $i <= $fila->cantidad; $i++) {
                                    foreach ($_SESSION['cesta'] as $producto) {
                                        if ($producto['id'] == $fila->id_producto) {
                                            if ($i == $producto['cantidad']) {
                                                echo '
                                                    <option value="' . $i . '" selected>' . $i . '</option>
                                                ';
                                                $subtotal += $fila->pvp * $i;
                                            } else {
                                                echo '
                                                    <option value="' . $i . '">' . $i . '</option>
                                                ';
                                            }
                                        }
                                    }
                                }

                                echo '  
                                        </select>
                                    </div>
                                </div>
                                ';
                            }
                        } catch (Exception $e) {
                            echo "<script>console.log('" . $e . "')</script>";
                        }
                        ?>
                    </div>
                    <div class="container-pago col s12 m4">
                        <div class="titulo">Total del pedido</div>
                        <div class="row">
                            <div class="txt-dinero">Subtotal</div>
                            <?php
                            echo '<div class="dinero">' . $subtotal . ' €</div>';
                            ?>
                        </div>
                        <div class="row">
                            <div class="txt-dinero">Envío</div>
                            <div class="dinero">Gratis</div>
                        </div>
                        <hr>
                        <div class="row total">
                            <div class="txt-dinero">Total (IVA incluido)</div>
                            <?php
                            $total = $subtotal * 121 / 100;
                            echo '<div class="dinero">' . number_format($total, 2) . ' €</div>';
                            ?>

                        </div>
                        <a href="factura.html" class="col s12 m12 btn white black-text lighten-1">COMENZAR PEDIDO</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>