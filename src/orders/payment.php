<?php
    session_start();
    include_once '../includes/conection.php';
    //order insert

    $con = getConnection();

    $id = $_SESSION["id_order"];
    $totalpay = $_POST["totalordertopay"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Batata do cheffi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand">Batata do cheffi</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link active border-right">
                Novo pedido
            </a>
            <a class="nav-item nav-link active">
                id do pedido: #<?=$id?> <!-- php id -->
            </a>
        </div>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active">
                <button type="button" class="btn btn-danger" onclick="cancelorder(<?=$id?>)"> Cancelar pedido </button>
            </a>
        </div>
    </nav>
    <div class="d-flex justify-content-center">
        <div class="row container mt-5">
                <div class="col pt-2 border-right">
                    <h4>Formas de pagamento</h4>
                    <button type="button" class="btn btn-primary" id="card" data-toggle="modal" data-target="#exampleModal">
                        Débito
                    </button>
                    <button type="button" class="btn btn-primary" id="money" data-toggle="modal" data-target="#exampleModal3">
                        Crédito
                    </button>
                    <button type="button" class="btn btn-primary" id="money" data-toggle="modal" data-target="#exampleModal2">
                        Dinheiro
                    </button>
                </div> 
                <div class="col">
                    <h4>Valor pago:</h4>
                    <div id="payed"></div>
                    <hr>
                    <h3 class="text-right d-block"> Total a pagar: <input type="text" id="total" size="4" value="<?=$totalpay?>" readonly></h3>
                </div>
                <div class="w-100"></div>
                <div class="col w-100">
                <button class="btn btn-success w-100 mt-4"  id="btn-submit" onclick="submitorder(<?=$id?>)"> Fazer pedido </button>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pagamento com Cartão de débito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Digite o valor:
                        <input type="text" id="debito">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close mr-3" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="addtomethods('debito')">
                            <i data-feather="check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
                <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pagamento em dinheiro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Digite o valor:
                        <input type="text" id="dinheiro">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close mr-3" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="addtomethods('dinheiro')">
                            <i data-feather="check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pagamento com cartão de Crédito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Digite o valor:
                        <input type="text" id="credito">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="close mr-3" data-dismiss="modal">
                            <i data-feather="x"></i>
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="addtomethods('credito')">
                            <i data-feather="check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</body>
    <script src="../../node_modules/feather-icons/dist/feather.min.js"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/orders.js"></script>
    <script src="../js/payment.js"></script>
    <script>
        feather.replace()
    </script>
</html>