<html>

  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Batata do cheffi</title>
  </head>
  <body class="container text-center">

    <?php
    include_once './../includes/conection.php';

    $con = getConnection();

    $sql = "SELECT id_isopened FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = array('status' => 'fechado');

    if ($stmt->rowCount() != 0) {
    $result = $stmt->fetch();
    }


    $con = getConnection();


    $sql2 = "SELECT * FROM orders WHERE  day_inserted = '".$result[0]."'";

    $execquery = $con->prepare($sql2);
    $execquery->execute();
    $result = $execquery->fetchAll();


    echo "

    <h2 class=\"mt-4\">Vendas do dia:</h2>
    <table class=\"w-100 text-center border\">
    <tr style=\"background: #cecece\">
    <th class=\"border-right\">ID da venda</th>
    <th>Total da venda</th>
    <th>status</th>
    <th></th>
    </tr>
    ";

    $total = 0;

    foreach ($result as $key => $value) {

    if ($result[$key]['status'] == "submited") {
    $result[$key]['status'] = "Concluído";
    }elseif ($result[$key]['status'] == "cancel") {
    $result[$key]['status'] = "Cancelado";
    }

    $total += floatval($result[$key]['total']);
    $num_order = number_format($result[$key]['total'], 2, ',', ' ');
    echo "
    <tr>
    <th class=\"border-bottom p-3\">#".$result[$key]['id_order']."</th>
    <th class=\"border-bottom\">$num_order</th>
    <th class=\"border-bottom\">".$result[$key]['status']."</th>
    <th class=\"border-bottom\">
    <a href=\"./detailOrder.php?id_order=".$result[$key]['id_order']."\">Ver detalhes <a></th>
    </tr>
    ";

    }
    echo "</table>
    <h5 class=\"text-right mr-5 mt-3\">
    Total:". number_format($total, 2, ',', ' ')."
    </h5>";
    ?>
    <a href="../index/index.php" class="btn btn-primary">Voltar</a>
  </body>
</html>