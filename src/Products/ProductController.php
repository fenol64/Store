<?php

    include_once '../includes/conection.php';


        
    function addProduct(){
        $con = getConnection();

        $name = $_POST["name"];
        $value = $_POST["value"];

        $sql = "INSERT INTO products VALUES (default, '$name', '$value')";

        if ($con->exec($sql)) {
            echo "Adicionado com Sucesso!";
        }
    }

    function selectProduct(){

        echo"<tr class=\"table-products\">
            <th class=\"p-3\">#</th>
            <th>Nome do Produto</th>
            <th>Valor do produto</th>
            <th class=\"text-right pr-5\">Editar | Deletar</th>
        </tr>";
 

        $con = getConnection();

        $sql = "SELECT * FROM products";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();
        $cont = 1;
        foreach ($result as $value) {
            echo "<tr>
                <td class=\"p-3\">".$cont++."</td>
                <td>". $value["name_product"]."</td>
                <td>". $value["value_product"]."</td>
                <td class=\"text-right\">
                    <button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#update\" onclick=\"getid(".$value["id_product"].")\">
                        <i data-feather=\"edit\"></i>
                    </button>
                    <button class=\"btn btn-danger mr-5\" onclick=\"del(".$value["id_product"].")\">
                        <i data-feather=\"x\"></i>
                    </button>
                </td>
            </tr>";
        }
    }

    function updateProduct($id){

        $con = getConnection();

        $name = $_POST["name"];
        $value = (float) $_POST["value"];

        $sql = 'UPDATE products SET';

        if (!empty($name)) {
            $sql = $sql. " name_product = '$name', ";
        }

        if (!empty($value)) {
            $sql = $sql. " value_product = '$value' ";
        }

        $sql = $sql. " WHERE id_product = '$id' ";

        if ($con->exec($sql)) {
            echo "Atualizado com sucesso!";
        }else{
            echo "erro!";
        }
    }  

    function DeleteProduct($id){
        $con = getConnection();

        $sql = 'DELETE FROM products WHERE id_product = :id';

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Deletado com sucesso!";
        }else{
            echo "erro!";
        }
    }

    
    if ($_POST["type"] == "select") {
        selectProduct();
    }elseif ($_POST["type"] == "add") {
        addProduct();
    }elseif ($_POST["type"] == "update") {
        updateProduct($_POST["id"]);
    }elseif ($_POST["type"] == "delete") {
        DeleteProduct($_POST["id"]);
    }
