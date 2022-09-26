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
    $statement=$mbd->prepare("INSERT INTO table_02 (id, Table_01_id, ciudad, direccion, fechar_hora, fecha, telefono, valor_pago, email) VALUES (:ide, :foren, :ciu, :direc, :f_hora, :fecha, :tel, :v_pago, :emai)");

    // Asociamos los parametros de la consulta a las variables de los datos
    $statement->bindParam(':ide', $id);
    $statement->bindParam(':foren', $foranea);
    $statement->bindParam(':ciu', $ciudad);
    $statement->bindParam(':direc', $direccion);
    $statement->bindParam(':f_hora', $f_hora);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':tel', $telefono);
    $statement->bindParam(':v_pago', $v_pago);
    $statement->bindParam(':emai', $email);    

    // Asignamos los datos de las variables
    $id = $_POST['id'];
    $foranea = $_POST['Table_01_id'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $f_hora = $_POST['fechar_hora'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $v_pago = $_POST['valor_pago'];
    $email = $_POST['email'];

    // Insertar
    $statement->execute();
    
  
    // Retornamos resultados
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        
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