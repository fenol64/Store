<style>
.table-products:nth-child(odd){
    background: #cecece73;
}
</style>
<?php
    include_once '../includes/nav.php';
    include_once './ProductController.php'
?>

<div class="container mt-5">
    <h1 class="h2 border-bottom"> 
        Produtos cadastrados
    </h1>

    <table class="w-100 mt-3 ">
        <tr class="table-products">
            <th>ID</th>
            <th>Nome do Produto</th>
            <th>Valor do produto</th>
            <th></th>
        </tr>
    </table>
    <button class="btn btn-success mt-3 w-100">
        Novo
    </button>
</div>

    <script>
        feather.replace()
    </script>