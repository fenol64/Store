<?php
    session_start();
    include_once '../includes/conection.php';
?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Batata do cheffi</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Batata do Cheffi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../index/index.php">Painel</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vendas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../orders/order.php">
                            <i data-feather="shopping-cart" class="mr-3"></i>
                            Nova Venda
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Products/Products.php">
                            <i data-feather="list" class="mr-3"></i> 
                            Produtos
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">Relatório</a>
                </li>
            </ul>

            <a class="nav-link Start-Stop text-white btn btn-outline-light mr-2" id="start-button">
                Iniciar Vendas
            </a>
            <a class="nav-link Start-Stop text-white btn btn-outline-light" id="stop-button">
                Parar Vendas
            </a>
            <a href="" class="nav-link text-danger">Sair</a>
        </div>
    </nav>


    <script src="../../node_modules/feather-icons/dist/feather.min.js"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/Sells.js"></script>
    <script>
        feather.replace()
    </script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Relário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="../Reports/reports.php" method="post">
            <div class="modal-body">
                <a class="mt-2 mb-2 d-block">
                    Data inicial: <input type="datetime-local" name="inicial-Date" required>
                </a> 
                <a class="mt-2 mb-2 d-block">
                    Data final: <input type="datetime-local" name="final-Date" required>
                </a> 
            </div>
            <div class="modal-footer">
                <button type="Reset" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
  </div>
</div>