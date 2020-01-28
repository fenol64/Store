<?php

    include_once './../includes/conection.php';

    $con = getConnection();
    $id = $_GET["id_order"];
?>
<html>
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <style>th,td{padding:10px 55px;}</style>
  <title>Batata do cheffi</title>
</head>
<body>
    <h1 class="h2 mt-3 text-center">Detalhes da venda #<?=$id?></h1>
    <div class="container d-flex flex-column justify-content-center">
        <table class="mt-4">
            <tr class="bg-secondary">
                <th>Nome do produto</th>
                <th>Valor do produto</th>
            </tr>
            <?php
                $sql = "SELECT * from orderbody where id_order = '$id'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $key => $value):
            ?>
                    <tr>
                        <td><?=$result[$key]["name_product"]?></td>
                        <td class="text-right"><?=$result[$key]["value_product"]?></td>
                    </tr>

            <?php
                endforeach;
            ?>
            <tr style="border-bottom: 1px solid #000">
                <th>Total: </th>
                <th class="text-right"><?=$_GET["total"]?></th>
            </tr>
            <?php

                $conn = getConnection();

                $query = "SELECT * from payment WHERE id_order = '$id'";
                $sttmt = $conn->prepare($query);
                $sttmt->execute();
                $resultado = $sttmt->fetchAll();

                foreach ($resultado as $key => $value):
            ?>
                <tr>
                    <td><?=$resultado[$key]["method"]?></td>
                    <td class="text-right"><?=-$resultado[$key]["value_paid"]?></td>
                </tr>
            <?php
                endforeach;
            ?>
        </table>

        <a href="./day_report.php" class="d-block btn btn-primary">Voltar</a>
    </div>
</body>
</html> 