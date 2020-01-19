<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .main-container{
            margin: 10px 20% 5% 20%;
        }
    </style>
    <title>Document</title>
</head>
<body class="container text-center">
<div class="main-container">
<table class="text-center w-100">
    <?php
        include_once '../includes/conection.php';

        $id = $_GET["id_order"];
        echo "
            <h2 class=\"mb-3\">Detalhes da venda #$id</h2>
        ";
        $con = getConnection();

        $sql = "SELECT * FROM orders WHERE id_order = '$id'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $total = "";
        foreach ($result as $key => $value) {
            $total = $result[$key]['total'];
        }
        echo "
        <tr style=\"background: #cecece\">
            <th class=\"p-3\"> Produtos: </th>
            <th> Valor do produto: </th>
        </tr>
        ";

        $sql = "SELECT * FROM orderbody WHERE id_order = '$id'";
        $stmt2 = $con->prepare($sql);
        $stmt2->execute();

        $result = $stmt2->fetchAll();

        foreach ($result as $key => $value) {
            echo "
            <tr>
                <td class=\"p-3\">".$result[$key]['name_product']."</td>
                <td class=\"text-right mr-5\">".$result[$key]['value_product']."</td>
            </tr>
        ";
        }

        echo "
        <tr class=\"border-top\">
            <th class=\"p-3\">Total:</th>
            <td class=\"text-right mr-5\">$total</td>
        </tr>
    ";
    ?>
</table>
</div>
<a href="../index/index.php" class="pl-5 pr-5 btn btn-dark text-center">Voltar</a>
</body>
</html>
