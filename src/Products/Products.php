<style>
.table-products:nth-child(odd){
    background: #cecece73;
}
</style>
<?php
    include_once '../includes/nav.php';
?>

<div class="container mt-5">
    <h1 class="h2 border-bottom"> 
        Produtos cadastrados
    </h1>

    <table class="w-100 mt-3" id="resultado">

    </table>
    <button class="btn btn-success mt-3 w-100" data-toggle="modal" data-target="#exampleModal2">
        Novo
    </button>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nome do Produto: <input type="text" id="name" class="d-block w-100 rounded border"> 
        Valor do Produto: <input type="text" id="value" class="d-block w-100 rounded border"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="add();">Enviar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nome do Produto: <input type="text" id="upname" class="d-block w-100 rounded border"> 
        Valor do Produto: <input type="text" id="upvalue" class="d-block w-100 rounded border"> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="update();">Enviar</button>
      </div>
    </div>
  </div>
</div>

<script src="./req.js"></script>