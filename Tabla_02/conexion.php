<?php
try {
    # conexion a la base de datos
    $mbd = new PDO('mysql:host=localhost;dbname=desarrollo_web', "root", "");

    # SQL
    $sql = "SELECT * FROM table_02";

    # Preparar query
    $statement = $mbd->prepare($sql);

    # Ejecutar
    $statement->execute();

    # Obtencion de datos

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    header('Content-type:application/json;charset=utf-8');    
    echo json_encode($results);
    
    //$mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>


