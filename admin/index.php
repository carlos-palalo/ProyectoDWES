<!DOCTYPE html>
<html>
<?php
try {
    session_start();
    require "../conexion.php";
    $tablas = $bd->prepare('SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "proyectotiendaropa_carlosp"');
    $columnas = $bd->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "cesta"');
    $nombreTabla = "cesta";
    $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if (isset($_REQUEST['tabla'])) {
        $nombreTabla = $_REQUEST['tabla'];
        $columnas = $bd->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "' . $nombreTabla . '"');
        $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    }
} catch (Exception $e) {
    echo "<script>console.log('" . $e . "')</script>";
}
?>

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

        table td {
            padding: 15px 0px;
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
                        <a href="../index.php" class="brand-logo">Roupalia</a>
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
            <form method="POST" name="tablas">
                <?php
                try {
                    $tablas->execute();
                    while ($fila = $tablas->fetch(PDO::FETCH_OBJ)) {
                        echo "<li class='f pantalones'><input type='submit' name='tabla' value='" . strtoupper($fila->TABLE_NAME) . "'></li>";
                    }
                } catch (Exception $e) {
                    echo "<script>console.log('Error Categorías. " . $e . "')</script>";
                }
                ?>
            </form>
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
        <div class="row">
            <div class="tabla col s12 m12">
                <form id="tabla" method="POST" name="<?php echo $nombreTabla; ?>">
                    <table class="highlight centered">
                        <thead>
                            <?php
                            echo "<tr>";
                            try {
                                $columnas->execute();
                                while ($fila = $columnas->fetch(PDO::FETCH_OBJ)) {
                                    echo "<th>" . $fila->COLUMN_NAME . "</th>";
                                }
                            } catch (Exception $e) {
                                echo "<script>console.log('Error Categorías. " . $e . "')</script>";
                            }
                            echo "</tr>";
                            ?>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                $info->execute();
                                while ($fila = $info->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                    echo "<tr>";
                                    foreach ($fila as $value) {
                                        echo "<td contenteditable='true'>" . $value . "</td>";
                                    }
                                    echo "</tr>";
                                }
                            } catch (Exception $e) {
                                echo "<script>console.log('Error Categorías. " . $e . "')</script>";
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </main>
</body>

</html>