<?php

    include_once './../includes/conection.php';


    function status(){
        $con = getConnection();


        $sql = "SELECT status FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
        }else{
            $result = array( '0' => 'fechado' );
        }
        

        echo json_encode($result);
    }




    function start(){
        $con = getConnection();

        $sql = "INSERT INTO isopened VALUES (default, default, default, default)";

        if ($con->exec($sql)) {
            echo "Adicionado com Sucesso!";
        }else{
            echo "erro";
        }

        $sql = "SELECT * FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }


    function stop(){
        $con = getConnection();

        $sql = "UPDATE isopened SET time_final = current_timestamp, status = 'fechado' WHERE 1";

        if ($con->exec($sql)) {
            echo "Atualizado com Sucesso!";
        }else{
            echo "erro";
        }
    }


    $open = $_POST["open"];
   
    if ($open == 'aberto') {
        start();
    }elseif ($open == 'fechado') {
        stop();
    }else{
        status();
    }







?>