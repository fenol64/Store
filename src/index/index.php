<!doctype html>
<html lang="pt-br">
  <head>
  <link rel="stylesheet" href="./index.css">
    <?php
    include_once '../includes/conection.php';
      include_once '../includes/nav.php';
    ?>
    <div class="centers">
      <?php
          $con = getConnection();

          $sql = "SELECT * FROM isopened WHERE id_isopened = (SELECT MAX(id_isopened) FROM isopened)";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetchAll();
          
          $inicial = $result[0]['time_inicial'];
          $final = $result[0]['time_final'];

          $sql2 = "SELECT * FROM orders WHERE ";
          
          if ($final == "0000-00-00 00:00:00") {
            $sql2 = $sql2. " day_inserted >= '$inicial'";
          }else{
            $sql = $sql2. " day_inserted >= '$inicial' AND day_inserted <= '$final'";
          }
          
          $execquery = $con->prepare($sql2);
          $execquery->execute();
          $result = $execquery->fetchAll();
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

        R: () => {
          $('#exampleModal').modal('toggle')
        },
      
        P: () => {
          location.href = "../Products/Products.php"
        }
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