<?php
    session_start();
    include_once '../includes/conection.php';
    //order insert
    $con = getConnection();

    $sql = "SELECT * FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if ($result[0]['status'] == "fechado"){
        header('Location: ../index/index.php');
        die();
    }


    $con = getConnection();

    $idorder = rand(10000, 100000);
    $_SESSION["id_order"] = $idorder;

    $sql = "INSERT INTO orders VALUES ('$idorder', default, default, '".$result[0]["id_isopened"]."', default, default)";
    
    if ($con->exec($sql)) {
        // foi
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="../../node_modules/feather-icons/dist/feather.min.js"></script>
    <title>Batata do cheffi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Batata do cheffi</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link active border-right">
                Novo pedido
            </a>
            <a class="nav-item nav-link active" href="#">
                id do pedido: #<?=$idorder?> <!-- php id -->
            </a>
        </div>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">
                <button type="button" class="btn btn-danger" onclick="cancelorder(<?=$idorder?>)"> Cancelar pedido </button>
            </a>
        </div>
    </nav>
    <div style="margin-left: 8%">
        <div class="row container mt-5" >
            <div class="col pt-2 border-right">
                <h4 style="margin-top: -2%" class="pb-4">Produtos Disponíveis</h4>
                <?php

                    $con = getConnection();

                    $sql = "SELECT * FROM products";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
    
                    $result = $stmt->fetchAll();
                    $cont = 1;
                    foreach ($result as $value) {
                        echo "
                            <button type=\"button\" class=\"btn btn-primary btn-lg mt-2 mb-2\" onclick=\"addtocart(".$value["id_product"].", $idorder)\">".$value["name_product"]."</button>
                        ";
                    }
                
                ?>
            </div> 
            <div class="col">
                <h4>Produtos no carrinho</h4>
                <div id="cart"></div>
                <hr>
                <h3 class="text-right d-block"> Total: <input type="text" id="total" size="4" readonly></h3>
            </div>
            <div class="w-100"></div>
            <div class="col w-100">
                <form action="payment.php" method="post">
                    <input type="hidden"  name="totalordertopay" id="totalordertopay">
                    <button type="submit" class="btn btn-success w-100  mt-4"> PAGAMENTO </button>
                </form>
            </div>
        </div>
    </div>
</body>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/orders.js"></script>
    <script>
        feather.replace()
    </script>
</html>