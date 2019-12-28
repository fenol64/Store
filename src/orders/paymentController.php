<?php

    session_start();
    include_once '../includes/conection.php';

    $id_order = $_SESSION["id_order"];
    $method = $_POST["method"];
    $value = $_POST["valuePaid"];

    $con = getConnection();

    $sql = "INSERT INTO payment VALUES (default, '$id_order', '$method', '$value')";
    $exec = $con->prepare($sql);
    if ($exec->execute()) {

        $data = array(
            "id" => "$id_order",
            "method" => "$method",
            "value" => "$value"
        );

        echo json_encode($data);
    }


?>