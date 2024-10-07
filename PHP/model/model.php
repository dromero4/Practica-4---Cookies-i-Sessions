<!-- David Romero -->
<!-- definicio de les variables -->
<?php
$errors = [];
$titol = $_POST['titol'] ?? null;
$cos = $_POST['cos'] ?? null;

$id = $_POST['ID'] ?? null;

// Una de les variables més importants, en funcio del valor Enviar, fa una cosa o un altre.
$opcio = $_POST['Enviar'];
$seguro = $_POST['seguro'] ?? null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($opcio) {
        // En cas que Enviar sigui Inserir, anem al pas d'inserir
        case 'Inserir':
            if(!empty($titol) && !empty($cos)){
                try{

                    // El que fem es connectar-nos a la base de dades.
                    require '../connexio.php';

                    if ($connexio) {
                        // Aqui fem l'ús de prepared statements.
                        // En aquest cas preparem en una variable amb la query INSERT de MySQL
                        // i "bindeem" les variables amb el parametre "bindParam"
                        $insertarDades = $connexio->prepare("INSERT INTO articles (titol, cos) VALUES(:titol, :cos)");
                        $insertarDades->bindParam(':titol', $titol);
                        $insertarDades->bindParam(':cos', $cos);

                        // Finalment l'executem.
                        $insertarDades->execute();
                
                        // Emmagatzemem l'ultim ID a una variable
                        $ultimoID = $connexio->lastInsertId();
                
                        include_once "../vista/inserir.php";
                        echo "L'ID del missatge és ".$ultimoID;
                        

                
                    }else{
                        echo "No s'ha pogut connectar a la base de dades";
                    }
                } catch (PDOException $e) {
                    echo "Error de conexión: " . $e;
                }
            } else {
                // El cas en que hi hagi algun error, s'emmagatzema en un array i en cas de que no sigui buit, es mostren
                if(empty($titol)){
                    $errors[] = "<br>El camp del titol és buit";
                }
    
                if(empty($cos)){
                    $errors[] = "<br>El camp del cos és buit";
                }
                
                if(!empty($errors)){
                    require "../vista/inserir.php";
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
                
            }
            break;
        case 'Modificar':
            // Al cas de modificar, el que fem en primer lloc es mirar si l'ID es buit
            if(!empty($id)){
                try{
                    // Ens connectem a la base de dades
                    require "../connexio.php";

                    if($connexio){
                        // I en cas de que estigui tot correcte, preparem les querys
                        $query = "SELECT COUNT(*) from articles";
                        $nTotal = $connexio->query($query);
                        $nTotal = $nTotal->fetchColumn();

                        $queryID = $connexio->prepare("SELECT * FROM articles WHERE ID = :id");
                        $queryID->bindParam(":id", $id);
                        $queryID->execute();

                        if($queryID->rowCount() != 0){

                            // Aqui definim els 3 tipos de casos, tant com si volem nomes editar el titol, com si nomes volem editar el cos,
                            // i com si volem editar tots dos camps, i evidentment, si no hi ha res seleccionat
                            if(!empty($titol) && !empty($cos)){
                                $modificarDades = $connexio->prepare("UPDATE articles SET titol = :titol, cos = :cos WHERE ID = $id");
                                $modificarDades->bindParam(':titol', $titol);
                                $modificarDades->bindParam(':cos', $cos);
                                $modificarDades->execute();
        
                                include_once '../vista/modificar.php';
                                echo "<br>Missatge amb ID: $id editat correctament";
                            } else if(!empty($titol) && empty($cos)){
                                $modificarDades = $connexio->prepare("UPDATE articles SET titol = :titol WHERE ID = $id");
                                $modificarDades->bindParam(':titol', $titol);
                                $modificarDades->execute();
    
                                include_once '../vista/modificar.php';
                                echo "<br>Missatge amb ID: $id editat correctament";
                            } else if(empty($titol) && !empty($cos)){
                                $modificarDades = $connexio->prepare("UPDATE articles SET cos = :cos WHERE ID = $id");
                                $modificarDades->bindParam(':cos', $cos);
                                $modificarDades->execute();
    
                                include_once '../vista/modificar.php';
                                echo "<br>Missatge amb ID: $id editat correctament...";
                            } else {
                                include_once '../vista/modificar.php';
                                echo "<br>No s'ha modificat cap dada";
                            }
                        } else {
                            require '../vista/modificar.php';
                            echo "<br>No s'ha trobat l'ID $id";
                        }

                        
                    }

                    
                } catch (PDOException $e){
                    echo "Error de conexión: " . $e;
                }
            } else {
                require "../vista/modificar.php";
                echo "<br>Has de seleccionar l'ID";
                
            }
            
            break;
        case 'Esborrar':
            // En el cas d'Esborrar, verifiquem si l'ID es buit o no
                if(!empty($id)){
                    try {
                        // Ens connectem a la bse de dades
                        require '../connexio.php';

                        if($connexio){
                            // I preparem les querys, en aquest cas, seleccionem l'ID
                                $query = "SELECT ID from articles WHERE ID = $id";
                                $resultat = $connexio->query($query);

                                // Si aquest ID existeix, verifiquem si l'usuari vol que es borri finalment
                                if($resultat->rowCount() != 0){                                   
                                $id = $_POST['ID'] ?? null;

                                if ($id) {
                                    echo "Estás seguro que quieres borrar el artículo $id?";
                                }
                                ?>

                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Esborrar</title>
                                </head>
                                <body>
                                    <form action="" method="post">
                                        <input type="hidden" name="Enviar" value="Esborrar">
                                        <input type="hidden" name="ID" value="<?php echo htmlspecialchars($id); ?>">
                                        <button type="submit" name="seguro" value="Si">Si</button>
                                        <button type="submit" name="seguro" value="No">No</button>
                                    </form>
                                </body>
                                </html>

                                <?php
                                $seguro = $_POST['seguro'] ?? null;

                                // En cas que l'usuari hagi ficat que si, com abans, preparem la query, que en aquest cas es
                                // per esborrar l'article, i l'esborrem
                                if ($seguro === 'Si') {
                                    $eliminarDades = $connexio->prepare("DELETE FROM articles WHERE ID = :id");
                                    $eliminarDades->bindParam(':id', $id);
                                    $eliminarDades->execute();
                                    
                                    echo "<br>Datos eliminados correctamente.";
                                    ?>
                                    <button><a href="../index.php">Tornar</a> </button>
                                    <?php
                                } else if ($seguro === 'No') {
                                    // EN cas de que hagi sigut que no, mostrem un missatge per pantalla
                                    echo "<br>Datos no eliminados.";
                                }


                                } else {
                                    // Si l'ID es buit
                                    require '../vista/esborrar.php';
                                    echo "<br>No s'ha trobat l'ID $id";
                                }
                            
                        }
                    } catch (PDOException $e){
                        // En cas de que la connexio a la base de dades hagi fallat
                        echo "Error de conexión: " . $e;
                    }
                } else {
                    require '../vista/esborrar.php';
                    echo "<br>Has d'omplir el camp de l'ID";
                }
            break;
    }
}

?>





