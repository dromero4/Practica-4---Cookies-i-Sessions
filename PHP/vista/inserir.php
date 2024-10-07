<!-- David Romero -->

<?php
$titol = '';
$cos = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Aqui tenim l'HTML del formulari per poder introduir les dades que volguem -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir article</title>
    <!-- <link rel="stylesheet" href="../estils/estils.css"> -->
</head>
<body>
    <form action="../model/model.php" method="post">
        <div class="container">
            <table>
            <h3>Introdueix el titol i el missatge que vulguis inserir a la base de dades</h3>
            <label for="Titol"></label>
            <!-- L'echo php del value, s'h posat aqui per fer que no es borri el valor en cas d'haver algun error -->
            <input type="text" name="titol" placeholder="Titol" value="<?php echo htmlspecialchars($titol)?>"><br><br>

            <label for="Cos"></label>
            <input type="text" name="cos" placeholder="Missatge" value="<?php echo htmlspecialchars($cos)?>"><br><br>

            <input type="submit" name="Enviar" value="Inserir"><br><br>
            
            
            </table>
        </div>
        
    </form>

    <!-- Botó per tornar enrere -->
    <button>
                <a href="../index.php">Tornar</a>
            </button>
    
</body>
</html>






