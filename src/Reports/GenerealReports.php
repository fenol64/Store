<!doctype html>
<script>
    const day = <?= $_POST["day"] ?>
</script>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./styles.css">
        <title>Batata do cheffi</title>
    </head>
  <body>
    <div class="container">
        <?php 
            if ($_POST["day"] != 0) {
                echo "<h1 class=\"border-bottom\">Relatório de ".$_POST["day"]." dias átras</h1>";
            }else{
                echo "<h1 class=\"border-bottom\">Relatório do dia</h1>";
            }
        ?>
        <div class="row center">
            <div class="col">
                <div class="container-test height mb-4">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <h3 class="h3 text-center border-bottom">Pedidos</h3>
                <div class="main-box mt-4">
                    <div class="box">
                        <h5>Vendas Canceladas</h5>
                        <span id="cancelorder">0</span>
                    </div>
                    <div class="box">
                        <h5>Vendas feitas</h5>
                        <span id="doneorders">0</span>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col">
                <h3 class="mt-4 border-bottom text-center">Financeiro</h3>
                <div class="main-box mt-4">
                    <div class="box mb-5">
                        <h5>Vendas com cartão de crédito</h5>
                        <span id="cred">0</span>
                    </div>
                    <div class="box">
                        <h5>Vendas com cartão de débito</h5>
                        <span id="deb">0</span>
                    </div> 
                    <div class="box">
                        <h5>Vendas com dinheiro</h5>
                        <span id="din">0</span>
                    </div> 
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col text-center">
                <h4 id="total" class="mt-3 mt-5 w-100">
                    Total vendido: R$0,00
                </h4>            
                <a href="../index/index.php" class="btn btn-primary mt-3 mb-5">Voltar</a>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../node_modules/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../js/Reports.js"></script>
 </body>
</html>