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
      <div class="centers row text-center">
        <a href="../orders/order.php" class="box bg-success text-white">
          <h2>Nova Venda</h2>
        </a>
        <a href="../Reports/day_report.php" class="box bg-secundary text-white">
          <h2>Relatório do dia</h2>
        </a>
      </div>
  </body>
</html>