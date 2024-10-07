<!-- David Romero -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <!-- <link rel="stylesheet" href="estils/estils.css"> -->
</head>
<body>
    <!-- Pàgina principal per decidir què vols fer -->
     <!-- Si vols editar, inserir, esborrar o consultar. -->
    <table>
        <div class="container">
        <form action="controlador/controlador.php" method="post">
            <select id="accion" name="accion">
            <option value="insertar">Insertar</option>
            <option value="modificar">Modificar</option>
            <option value="eliminar">Eliminar</option>
            <option value="consultar">Consultar</option>
            </select><br><br>
            <input type="submit" name="Enviar">
        </form>
        </div>
    </table>
</body>
</html>

<?php
require "connexio.php";
?>


