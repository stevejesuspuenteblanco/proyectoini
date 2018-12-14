<?php



if( isset($_GET['id']) ) {
    get_persons($_GET['id']);
} else {
    die("Solicitud no válida.");
}

function get_persons( $id ) {
    
    //Cambia por los detalles de tu base datos
    $dbserver = "localhost";
    $dbuser = "root";
    $password = "";
    $dbname = "catalogo";
    
    $database = new mysqli($dbserver, $dbuser, $password, $dbname);
    
    if($database->connect_errno) {
        die("No se pudo conectar a la base de datos");
    }
        /* cambiar el conjunto de caracteres a utf8 */
    if (!$database->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $database->error);
        exit();
    } 
        
    $jsondata = array();
    
    //Sanitize ipnut y preparar query
    //if( is_array($id) ) {
    //    $id = array_map('intval', $id);
    //    $querywhere = "WHERE `id_catalogo` IN (" . implode( ',', $id ) . ")";
    //} else {
    //    $id = intval($id);
    //    $querywhere = "WHERE `id_galeria` = " . $id;
    //}
     $result = $database->query( "SELECT * FROM `galeria` where id_catalogo=$id " ) ;
    
    if ($result!=null) {
        if( $result->num_rows > 0 ) {
            
            $jsondata["success"] = true;
            $jsondata["data"]["message"] = sprintf("", $result->num_rows);
            $users= array();
           // $count=0;
            while( $row = $result->fetch_object() ) {

                //$jsondata["data"]["users"][] es un array no asociativo. Tendremos que utilizar JSON_FORCE_OBJECT en json_enconde
                //si no queremos recibir un array en lugar de un objeto JSON en la respuesta
                $jsondata["data"]["users"][] =$row;
            //    $count++;
            }
        //    $jsondata["data"]["users"]=json_encode($users, JSON_FORCE_OBJECT);
        } else {
            
            $jsondata["success"] = false;
            $jsondata["data"] = array(
            'message' => 'No se encontró ningún resultado.'
            );
            
        }
        
        $result->close();
        
    } else {
        
        $jsondata["success"] = false;
        $jsondata["data"] = array(
        'message' => $database->error
        );
        
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    
    $database->close();
    
}

exit();                            