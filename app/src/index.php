<!DOCTYPE html>
<html>
<head>
    <title>Formulario Lab0</title>
</head>
<body>
<h2>Formulario PHP</h2>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="edad">Edad:</label><br>
        <input type="text" id="edad" name="edad"><br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    //obtenemos la info del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $descripcion = $_POST["descripcion"];

        //guardamos nombre desc en nombre.txt
        $nombreFile = fopen("nombre.txt", "a");
        fwrite($nombreFile, "$nombre: $descripcion\n");
        fclose($nombreFile);

        // guardamos la edad en edad.txt
        $edadFile = fopen("edad.txt", "a");
        fwrite($edadFile, "$edad\n");
        fclose($edadFile);

        //calculo media
        $edades = file("edad.txt", FILE_IGNORE_NEW_LINES);
        $totalEdades = array_sum($edades);
        $cantidadUsuarios = count($edades);
        $mediaEdad = $totalEdades / $cantidadUsuarios;
        echo "La media de edad de tus usuarios es: $mediaEdad";
    }
    ?>
</body>
</html>
<?php

?>
