<!-- David Romero -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar arxiu</title>
    <!-- <link rel="stylesheet" href="../estils/estils.css"> -->
</head>
<body>
    <!-- Formulari que demana l'ID de l'article, i el titol i cos per poder modificar -->
    <h3>Quin element vols modificar?</h3>   
    <form action="../model/model.php" method="post">
        <label for="id"></label>
        <input type="number" id="ID" name="ID" placeholder="ID">

        <label for="titol"></label>
        <input type="text" id="titol" name="titol" placeholder="Titol editat: ">

        <label for="cos"></label>
        <input type="text" id="cos" name="cos" placeholder="Cos editat: ">

        <input type="submit" name="Enviar" value="Modificar">
        
    </form>

    <button>
                <a href="../index.php">Tornar</a>
            </button>
</body>
</html>
