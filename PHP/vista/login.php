<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sessió</title>
</head>
<body>
    <h3>Inici de Sessió</h3>
    <form action="login.php">
        <label for="usuari"></label>
        <input type="text" placeholder="Usuari"><br><br>

        <label for="contrassenya"></label>
        <input type="password" placeholder="Contrassenya"><br><br>

        <input type="submit" name="EnviarLogin" value="Log In">

        <p>No tens compte? <a href="registre.php">Registra't aqui</a>
    </form>
</body>
</html>