<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <style>
    th, td{
      padding:10px;
    }

    th{
      background: #cecece;
    }

    body{
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    table{
      margin: 0 20%;
    }
  </style>
  <title>Document</title>
</head>
<body class="text-center">

<a href="../index/index.php" class="text-right mr-4 fixed-top">Voltar</a>

  <?php
        include_once '../includes/conection.php';

        function data($data){
          return date("d/m/Y", strtotime($data));
        }

        $datas = [
          $_POST["inicial-Date"],
          $_POST["final-Date"]
        ];

        $datas[0] = explode("T", $datas[0]);
        $fdataInicial = data($datas[0][0]);
        $datas[1] = explode("T", $datas[1]);
        $fdataFinal = data($datas[1][0]);
        $datas[0] = implode(" ", $datas[0]);
        $datas[1] = implode(" ", $datas[1]);

        $inicial =  $datas[0]. ":00";
        $final = $datas[1]. ":00"; 
  ?>

        <h1 class="mb-4">Relatorio do dia <?=$fdataInicial?> Até <?=$fdataFinal?></h1>

    
    <table class="text-center" id="table">
    <?php
      
      $con = getConnection();

      $sql = "SELECT * from orders WHERE day_inserted >= '$inicial' AND day_inserted <= '$final'";
      $exec = $con->prepare($sql);
      $exec->execute();
      $result = $exec->fetchAll();

      $cont = 0;

      foreach ($result as $key) {

        if ($key["status"] == "submited") {
          $key["status"] = "Concluido";
        }elseif ($key["status"] == "cancel") {
          $key["status"] = "Cancelado";
        }

        echo "
        <tr>
          <th>ID: ".$key["id_order"]."</th>
          <th>total: ".$key["total"]."</th>
          <th>Status: ".$key["status"]."</th>
        </tr>
        ";

        $cont += floatval($key["total"]);

        $con = getConnection();

        $id_order = $key["id_order"];

        $query = "SELECT * FROM orderbody WHERE id_order = '$id_order'";
        $execute = $con->prepare($query);
        $execute->execute();
        $resultado = $execute->fetchAll();

        foreach ($resultado as $registro) {

          if ($registro["status_order"] == "submited") {
            $registro["status_order"] = "OK";
          }elseif ($registro["status_order"] == "cancel") {
            $registro["status_order"] = "Cancelado";
          }

          echo "<tr>
              <td>".$registro["name_product"]."</td>
              <td>".$registro["value_product"]."</td>
              <td>".$registro["status_order"]."</td>
              </tr>";
        }


        $sql2 = "SELECT * FROM payment WHERE id_venda = '$id_order'";
        $execut = $con->prepare($sql2);
        $execut->execute();
        $resultad = $execut->fetchAll();

        foreach ($resultad as $keys) {
          echo "<tr class=\"border-top\">
          <td class=\"font-weight-bolder\"> Pago com: ".$keys["method"]."</td>
          <td> Valor pago: ".$keys["valor_paid"]."</td>
          <td></td>
          </tr>";
        }
      }
    ?>
    <tr class="border-top">
      <td></td>
      <td class="h3">Total: <?=$cont?></td>
      <td></td>
    </tr>
  </table>

  <button class="btn btn-primary mt-5" onclick="Window.print()">Imprimir</button>
</body>
</html>
