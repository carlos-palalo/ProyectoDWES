<?php
try {
    require "conexion.php";
    $bd = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia);
    $categorias = $bd->prepare('SELECT nombre FROM producto GROUP BY nombre');
    $productos = $bd->prepare('SELECT * FROM producto');
    $productos_filtrados = $productos;
    $cad = 'SELECT * FROM producto';
    if (isset($_REQUEST['categoria'])) {
        $cookie_cad;
        $cad = 'SELECT * FROM producto WHERE nombre = "' . $_REQUEST['categoria'] . '"';
        setcookie($cookie_cad, $cad, time() + (86400 * 30), "/");
    }
    if (isset($_REQUEST['btn-filtrar'])) {
        $where_cont = 0;
        if ($_REQUEST['sexo'] != "") {
            if ($where_cont > 0) {
                $cad .= ' AND';
            } else {
                $cad .= ' WHERE';
            }
            $cad .= ' sexo = "' . $_REQUEST['sexo'] . '"';
            $where_cont++;
        }
        if ($_REQUEST['talla'] != "") {
            if ($where_cont > 0) {
                $cad .= ' AND';
            } else {
                $cad .= ' WHERE';
            }
            $cad .= ' talla = "' . $_REQUEST['talla'] . '"';
            $where_cont++;
        }
        if ($_REQUEST['marca'] != "") {
            if ($where_cont > 0) {
                $cad .= ' AND';
            } else {
                $cad .= ' WHERE';
            }
            $cad .= ' marca = "' . $_REQUEST['marca'] . '"';
            $where_cont++;
        }
        if ($_REQUEST['orden'] != "") {
            $cad .= " ORDER BY pvp " . $_REQUEST['orden'];
        }
    }
    $productos_filtrados = $bd->prepare($cad);
    $marca = $bd->prepare('SELECT marca FROM producto GROUP BY marca');
    $talla = $bd->prepare('SELECT talla FROM producto GROUP BY talla');
} catch (Exception $e) {
    echo "<script>console.log('" . $e . "')</script>";
}
?>
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
            width: 150px !important;
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

        ul .f {
            font-weight: bold;
        }

        ul .f input {
            background-color: white;
            border: none;
            width: 100%;
            line-height: 48px;
        }

        ul .f input:hover {
            transition: background-color 0.5s;
            background-color: gainsboro;
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

        form button:hover {
            background-color: black !important;
            color: white !important;
            opacity: 0.9;
        }

        .error {
            font-size: large;
            font-weight: bold;
            text-align: center;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                            <li><a href="cesta.html">Cesta</a></li>
                            <li><a href="login.html">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="side-nav left fixed">
            <li class="logo">
                <a id="logo-container" href="" class="brand-logo">
                    <img src="img/logo.png" alt="Logo">
                </a>
            </li>
            <form method="POST">
                <li class="search">
                    <div class="input-field">
                        <input id="search" type="search" placeholder="Buscar marca o proucto">
                        <label class="label-icon" for="search"><i class="material-icons right">search</i></label>
                    </div>
                </li>
                <?php
                $categorias->execute();
                while ($fila = $categorias->fetch(PDO::FETCH_OBJ)) {
                    #echo "<li class='f'><input type='submit' name='" . $fila->nombre . "' value='" . $fila->nombre . "'></li>";
                    echo "<li class='f'><input type='submit' name='categoria' value='" . $fila->nombre . "'></li>";
                }
                ?>
            </form>
        </ul>
    </header>
    <main>
        <div class="container-filtro">
            <div class="container">
                <div class="row">
                    <form method="POST" name="filtros">
                        <div class="filtro col s12 m4">
                            <label>Ordenar Precio</label>
                            <select name="orden" class="browser-default">
                                <option value="" selected></option>
                                <option value="DESC">De mayor a menor (&gt;)</option>
                                <option value="ASC">De menor a mayor (&lt;)</option>
                            </select>
                        </div>
                        <div class="filtro col s12 m3">
                            <label>Sexo</label>
                            <select name="sexo" class="browser-default">
                                <option value="" selected></option>
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                            </select>
                        </div>
                        <div class="filtro col s12 m2">
                            <label>Talla</label>
                            <select name="talla" class="browser-default">
                                <option value="" selected></option>
                                <?php
                                $talla->execute();
                                while ($fila = $talla->fetch(PDO::FETCH_OBJ)) {
                                    echo '<option value="' . $fila->talla . '">' . $fila->talla . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filtro col s12 m3">
                            <label>Marca</label>
                            <select name="marca" class="browser-default">
                                <option value="" selected></option>
                                <?php
                                $marca->execute();
                                while ($fila = $marca->fetch(PDO::FETCH_OBJ)) {
                                    echo '<option value="' . $fila->marca . '">' . $fila->marca . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filtro col s12 m12">
                            <button class="btn white black-text lighten-1" type="submit" name="btn-filtrar">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Ordenar precio, talla, marca  -->
        </div>
        <div class="container">
            <div class="row">
                <div class="productos col s12 m12">
                    <?php
                    $productos_filtrados->execute();
                    $count = $productos_filtrados->rowCount();
                    if ($count == 0) {
                        echo '<p class="error">Lo sentimos, no se han encontrado productos</p>';
                    } else {
                        $productos_filtrados->execute();
                        while ($fila = $productos_filtrados->fetch(PDO::FETCH_OBJ)) {
                            echo '
                        <div class="container-product materialboxed col s12 m4">
                        <a href="#">
                            <img src="img/pantalon.jpg" alt="Foto">
                            <p class="marca">' . $fila->marca . '</p>
                            <p class="producto">' . $fila->nombre . '</p>
                            ';
                            switch ($fila->sexo) {
                                case "H":
                                    echo '<p class="genero">Hombre -- ' . $fila->talla . '</p>';
                                    break;
                                case "M":
                                    echo '<p class="genero">Mujer -- ' . $fila->talla . '</p>';
                                    break;
                            }
                            echo '
                            <p class="precio">' . $fila->pvp . ' €</p>
                        </a>
                        </div>
                        ';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                        content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
</body>

</html>