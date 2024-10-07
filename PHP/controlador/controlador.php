<?php
//David Romero

// em un include a cadascuna de les pagines en funcio del que hagim seleccionat a "index.php"
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['accion'])){
        $accion = $_POST['accion'];
    }

    if($accion == "insertar"){
        include "../vista/inserir.php";
    }

    if($accion == "modificar"){
        include "../vista/modificar.php";
    }

    if($accion == "eliminar"){
        include "../vista/esborrar.php";
    }

    if($accion == "consultar"){
        header("Location: ../vista/consultar.php");
    }
    
}

?>