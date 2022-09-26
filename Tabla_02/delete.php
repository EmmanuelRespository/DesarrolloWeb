<?php

try {
    # Conexion a la base de datos
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', "root", "");

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


// Ejecución de la consulta
try {    
    // Creamos una sentencia preparada
    $statement=$mbd->prepare("DELETE from table_01 WHERE id = ?");

    // Asociamos los parametros
    $statement->bindParam(1, $_POST['id']);

    // Ejecuto la sentencia preparada
    $statement->execute();

    // Obtengo todos los datos en un array
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Desconexión de la base de datos
    //$mbd = null;
    
    // Retorno resultados
    header('Content-type:application/json;charset=utf-8');
    echo json_encode([
        'mensaje' => "Datos eliminados correctamente",
        'persona' => $_POST
    ]);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>