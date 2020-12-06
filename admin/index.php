<!DOCTYPE html>
<html>
<?php
try {
    session_start();
    require "../conexion.php";
    $tablas = $bd->prepare('SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "proyectotiendaropa_carlosp"');
    $nombreTabla = "cesta";
    $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if (isset($_REQUEST['tabla'])) {
        $nombreTabla = $_REQUEST['tabla'];
        $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    }
    if (isset($_REQUEST['btn-ordenar'])) {
        $nombreTabla = $_REQUEST['tabla_name'];
        if ($_REQUEST['tipo_orden'] != "") {
            $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . ' ORDER BY ' . $_REQUEST['orden'] . ' ' . $_REQUEST['tipo_orden'] . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        } else {
            $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        }
    }
    if (isset($_REQUEST['btn-buscar'])) {
        $nombreTabla = $_REQUEST['tabla_name'];
        if ($_REQUEST['campo'] != "" && $_REQUEST['columna'] != "") {
            $campo = htmlspecialchars($_REQUEST['campo']);
            $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . ' WHERE ' . $_REQUEST['columna'] . ' = "' . $campo . '"', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        } else {
            $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        }
    }
    if (isset($_REQUEST['btn-actualizar'])) {
        $nombreTabla = $_REQUEST['tabla_name'];
        $columnas = $bd->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "' . $nombreTabla . '"');
        $flag = false;
        if (strcasecmp($nombreTabla, "cesta") == 0 || strcasecmp($nombreTabla, "pedido") == 0) {
            echo "<script>alert('No puedes modificar la tabla " . strtoupper($nombreTabla) . "');</script>";
        } else {
            for ($i = 1; $i <= $_REQUEST['numFilas']; $i++) {
                $cont = 0;
                $cad = 'UPDATE ' . $nombreTabla . ' SET ';
                $columnas->execute();
                $fila = $columnas->fetch(PDO::FETCH_OBJ);
                $id = $fila->COLUMN_NAME;
                while ($fila = $columnas->fetch(PDO::FETCH_OBJ)) {
                    $request = $fila->COLUMN_NAME . $i;
                    if ($_REQUEST[$request] != "") {
                        if ($cont == 0) {
                            $cad .= $fila->COLUMN_NAME . " = '" . $_REQUEST[$request] . "'";
                            $cont++;
                        } else {
                            $cad .= ", " . $fila->COLUMN_NAME . " = '" . $_REQUEST[$request] . "'";
                        }
                    }
                }
                $request = $id . $i;
                $cad .= " WHERE " . $id . " = '" . $_REQUEST[$request] . "'";
                $actu = $bd->prepare($cad);
                $actu->execute();
                if ($actu->rowCount() != 0) {
                    $flag = true;
                }
            }

            if ($flag == true) {
                echo "<script>alert('Datos actualizados con éxito');</script>";
            } else {
                echo "<script>alert('No se ha modificado ningún dato');</script>";
            }
        }
        $info =  $bd->prepare('SELECT * FROM ' . $nombreTabla . '', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    }
    $columnas = $bd->prepare('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "' . $nombreTabla . '"');
} catch (PDOException $e) {
    echo "Error - " . $e->getMessage();
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

        .row {
            margin-bottom: 0px !important;
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

        .filtro button {
            padding: 3px 0px;
            width: 150px;
        }

        .filtro button:nth-child(2) {
            float: right;
        }

        table {
            margin: 0 auto;
            width: fit-content;
        }

        table td {
            padding: 0px;
            width: fit-content;
        }

        table input {
            text-align: center;
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

        form button:hover {
            background-color: black !important;
            color: white !important;
            opacity: 0.9;
        }

        .busqueda {
            font-size: large;
            font-weight: bold;
            text-align: center;
            padding-top: 50px;
            height: 150px;
            width: 100%;
            left: 150px;
            position: fixed;
            background-color: white;
            z-index: 1;
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
                } catch (PDOException $e) {
                    echo "Error - " . $e->getMessage();
                }
                ?>
            </form>
        </ul>
    </header>
    <main>
        <form method="POST">

            <div class="container-filtro">
                <div class="container">
                    <div class="row">
                        <?php
                        echo '<input type="hidden" name="tabla_name" value="' . $nombreTabla . '">';
                        ?>
                        <div class="filtro col s12 m4">
                            <select name="orden" class="browser-default">
                                <option value="" selected>Ordenar por...</option>
                                <?php
                                try {
                                    $columnas->execute();
                                    while ($fila = $columnas->fetch(PDO::FETCH_OBJ)) {
                                        echo "<option value='" . $fila->COLUMN_NAME . "'>" . $fila->COLUMN_NAME . "</option>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error - " . $e->getMessage();
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filtro col s12 m4">
                            <select name="tipo_orden" class="browser-default">
                                <option value="">Tipo</option>
                                <option value="ASC">Ascendente</option>
                                <option value="DESC">Descendente</option>
                            </select>
                        </div>
                        <div class="filtro col s12 m4">
                            <button class="btn white black-text lighten-1" type="submit" name="btn-ordenar">Ordenar</button>
                            <button class="btn white black-text lighten-1" type="submit" name="btn-actualizar">Actualizar</button>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        echo '<input type="hidden" name="tabla_name" value="' . $nombreTabla . '">';
                        ?>
                        <div class="filtro col s12 m4">
                            <select name="columna" class="browser-default">
                                <option value="" selected>Buscar por...</option>
                                <?php
                                try {
                                    $columnas->execute();
                                    while ($fila = $columnas->fetch(PDO::FETCH_OBJ)) {
                                        echo "<option value='" . $fila->COLUMN_NAME . "'>" . $fila->COLUMN_NAME . "</option>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error - " . $e->getMessage();
                                }
                                ?>
                            </select>
                        </div>
                        <div class="filtro col s12 m4">
                            <input type="text" name="campo" placeholder="Introduce el valor">
                        </div>
                        <div class="filtro col s12 m4">
                            <button class="btn white black-text lighten-1" type="submit" name="btn-buscar">Buscar</button>
                            <button class="btn white black-text lighten-1" type="submit" name="btn-eliminar" disabled>Eliminar</button>
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
                                    $i = 0;
                                    $columnas->execute();
                                    while ($fila = $columnas->fetch(PDO::FETCH_OBJ)) {
                                        $column[$i] = $fila->COLUMN_NAME;
                                        echo "<th>" . $column[$i] . "</th>";
                                        $i++;
                                    }
                                } catch (PDOException $e) {
                                    echo "Error - " . $e->getMessage();
                                }
                                echo "</tr>";
                                ?>
                            </thead>
                            <tbody>
                                <?php
                                try {
                                    $numFilas = 0;
                                    $info->execute();
                                    if ($info->rowCount() != 0) {
                                        while ($fila = $info->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                            $i = 0;
                                            $numFilas++;
                                            echo "<tr>";
                                            foreach ($fila as $value) {
                                                echo "<td><input type='text' name='" . $column[$i] . "" . $numFilas . "' value='" . $value . "'></td>";
                                                $i++;
                                            }
                                            echo "</tr>";
                                        }
                                        echo '<input type="hidden" name="numFilas" value="' . $numFilas . '">';
                                    } else {
                                        echo "<div class='busqueda'>Lo siento, no se han encontrado resultados acordes con la búsqueda</div>";
                                    }
                                } catch (PDOException $e) {
                                    echo "Error - " . $e->getMessage();
                                }
                                ?>
                            </tbody>
                            <?php

                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </form>

    </main>
</body>

</html>