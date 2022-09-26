<?php

try {
    # Conexion a la base de datos
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


// Ejecución de la consulta
try 
{    
    // Creamos una sentencia preparada
    $statement=$mbd->prepare("INSERT INTO table_01 (id, descripcion, nombres, apellidos) VALUES (:ide, :descri, :nom, :ape)");

    // Asociamos los parametros de la consulta a las variables de los datos
    $statement->bindParam(':ide', $id);
    $statement->bindParam(':descri', $descripcion);
    $statement->bindParam(':nom', $nombres);
    $statement->bindParam(':ape', $apellidos);    

    // Asignamos los datos de las variables
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    // Insertar
    $statement->execute();
    
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        
        'mensaje' => "Datos insertados correctamente",
        'persona' =>$_POST
        
    ]);

} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'error' => [
            'codigo' =>$e->getCode() ,
            'mensaje' => $e->getMessage()
        ]
    ]);
}


?>