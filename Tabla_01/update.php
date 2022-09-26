<?php

try {
    # Conexion a la base de datos
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

//$id = $_POST['id'];
// Ejecución de la consulta
try 
{    
    // Creamos una sentencia preparada
    $statement = $mbd->prepare("UPDATE table_01  SET descripcion = ?, nombres = ?, apellidos = ? WHERE id = ?  ");

    
    $statement->bindParam(1, $_POST['id']);
    $statement->bindParam(2, $_POST['descripcion']);
    $statement->bindParam(3, $_POST['nombres']);
    $statement->bindParam(4, $_POST['apellidos']);

    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    $results = $statement->execute([$descripcion, $nombres, $apellidos, $id]);
        
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'mensaje' => "Registro actualizado con exito",      
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