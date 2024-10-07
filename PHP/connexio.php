<!-- David Romero -->

<?php 
$direccio = "localhost";
$nomBBDD = "pt02_david_romero";
$usuari = "root";
$contrasenya = "";

//  fitxer per a la connexio a la base de dades
    try{
        $connexio = new PDO("mysql:host=$direccio;dbname=$nomBBDD;charset=utf8", $usuari, $contrasenya);
        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "No s'ha pogut connectar a la base de dades...";
    }
    
?>