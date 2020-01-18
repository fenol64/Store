<?php

    include_once '../includes/conection.php';

    function getItem($id, $id_order) {

        //echo "$id, $id_order";
        
        $con = getConnection();

        $sql = "SELECT * FROM products WHERE id_product = '$id'";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        // inserting product to database
        $name = $result[0]['name_product'];
        $value = (Float)$result[0]['value_product'];
    
        $sql2 = "INSERT INTO orderbody (id, id_order, name_product, value_product, status_order) VALUES (default, '$id_order', '$name', '$value', default)";
        $con->exec($sql2);

        $con2 = getConnection();

        $getorderBody = "SELECT id FROM orderbody WHERE id = (SELECT MAX(id) FROM orderbody)";
        $exec = $con2->prepare($getorderBody);
        $exec->execute();

        $result[] = $exec->fetchAll();

        print_r(json_encode($result));
    }
    
    function updatetotal($total, $id_order) {

        $con = getConnection();
        $total = floatval($total);
        $query = "UPDATE orders SET total = '$total' WHERE id_order = '$id_order'";
        $stmt2 = $con->prepare($query);
        if ($stmt2->execute()) {
           echo "total atualizado";
        }else{
            echo "erro";
        }
    }

    function updateorders($id_order, $type){

        $con = getConnection();

        $sql3 = "UPDATE orders SET status = '$type' WHERE id_order = '$id_order'";
        $stmt2 = $con->prepare($sql3);
        $stmt2->execute();


        $sql4 = "UPDATE orderbody SET status_order = '$type' WHERE id_order = '$id_order'";
        $stmt3 = $con->prepare($sql4);
        $stmt3->execute();


    }

    switch ($_POST["type"]) {
        case 'insert':
            getItem($_POST["id"], $_POST["id_order"]);
            break;
        case 'updatetotal':
            updatetotal($_POST["total"], $_POST["id_order"]);
            break;  
        case 'cancel':
            updateorders($_POST["id_order"], $_POST["type"]);
            break;  
        case 'submited':
            updateorders($_POST["id_order"], $_POST["type"]); 
            break;
    }

?>

