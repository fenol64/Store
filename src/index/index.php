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
      <div class="centers">
        <a href="../orders/order.php" class="box bg-success text-white">
          <h3>Nova Venda</h3>
        </a>
        <a href="../Reports/day_report.php" class="box bg-secundary text-white">
          <h3>Relatório do dia</h3>
        </a>
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