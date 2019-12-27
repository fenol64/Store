<!doctype html>
<html lang="pt-br">
  <head>
  <link rel="stylesheet" href="./index.css">
    <?php
      session_start();
      if (!isset($_SESSION['condicao'])) {
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location: ../login/login.php");
      }

      include_once '../includes/conection.php';
      include_once '../includes/nav.php';
    ?>
    <div class="container text-center mt-5">
        
      <?php
          $con = getConnection();

          $sql = "SELECT * FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
          $stmt = $con->prepare($sql);
          $stmt->execute();

          if ($stmt->rowCount() != 0) {

            $result = $stmt->fetchAll();

            $inicial = $result[0]['time_inicial'];
            $final = $result[0]['time_final'];

            $sql2 = "SELECT * FROM orders WHERE  day_inserted >= '$inicial'";
            
            $execquery = $con->prepare($sql2);
            $execquery->execute();
            $result = $execquery->fetchAll();


            echo "

              <h3 class=\"text-left\">Vendas do dia:</h3>
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
                <a href=\"../orders/detailOrder.php?id_order=".$result[$key]['id_order']."\">Ver detalhes <a></th>
              </tr>
            ";

            }
            echo "</table>
            
            <h5 class=\"text-right mr-5 mt-3\">
            Total:". number_format($total, 2, ',', ' ')."
          </h5>";
          }else{
            echo "<div class=\"centers h2\">Inicie as vendas para começar!</div>";
          }
      ?>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
      // kypress functions
      var options = {
        N: () => {
          location.href = "../orders/order.php"
        },
      }
      //keypress inputs
      document.addEventListener('keydown', event => {
        let keypressed = event.key.toUpperCase()
        const location = options[keypressed]
        if (location) {
          location()  
        }
      })
    </script>
  </body>
</html>