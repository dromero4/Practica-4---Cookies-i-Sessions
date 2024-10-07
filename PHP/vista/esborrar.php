<!-- David Romero -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir article</title>
    <!-- <link rel="stylesheet" href="../estils/estils.css"> -->
</head>
<body>
    <!-- Aqui tenim l'HTML per poder introduir l'ID de l'article que volguem esborrar. -->
    <form action="../model/model.php" method="post">
        <h3>Introdueix l'ID del missatge que vulguis esborrar: </h3>
        <label for="ID"></label>
        <input type="number" name="ID" placeholder="ID: ">

        <input type="submit" name="Enviar" value="Esborrar">

       
    </form>
    <button>
                <a href="../index.php">Tornar</a>
            </button>
</body>
</html>

<!-- Un cop fet click al botó d'esborrar, es carrega el fitxer per connectar-se a la base de dades -->
<?php require "../connexio.php"; ?>