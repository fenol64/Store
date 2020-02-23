<?php

    include_once "../includes/conection.php";

    class Reports {

        public $products;
        public $report;

        function __construct() {
            $con = getConnection();

            $stmt = $con->prepare("SELECT name_product FROM products");
            $stmt->execute();

            $result = $stmt->fetchAll();

            $this->products = $result;
        }

        public function SellsDaysReport($day) {
            $cont = 0;
            foreach ($this->products as $product) {


                $con = getConnection();

                $stmt = $con->prepare("SELECT count(name_product), name_product FROM orderbody WHERE status_order <> 'cancel' AND created_At BETWEEN current_date()-'$day' AND current_date() AND name_product = '$product[0]'  ");
                $stmt->execute();
                
                $result = $stmt->fetchAll();
                
                $this->report[] = $result;  
                
                $cont++;
            }

            $this->report[] = $this->products;
            
            echo json_encode($this->report);
        }

        public function getamountorders($day){

            $con = getConnection();
            
            $stmt = $con->prepare("SELECT COUNT(IF(status = 'submited', 1, null)) 'feito', COUNT(IF(status = 'cancel', 1, null)) 'cancelado', SUM(total) FROM orders WHERE created_At BETWEEN current_date()-'$day' AND current_date() AND status <> 'cancel'");
            $stmt->execute();

            $result = $stmt->fetchAll();

            if ($result[0][2] == null) {
                $result[0][2] = "0,00";
            }else{
                $result[0][2] = number_format($result[0][2], 2, ',', '.');
            }

            echo json_encode($result);
        }



        public function getpayment($day) {

            $con = getConnection();

            $stmt = $con->prepare("SELECT COUNT(IF(`method` = 'debito', 1, null)) 'debito', COUNT(IF(`method` = 'credito', 1, null)) 'credito', COUNT(IF(`method` = 'dinheiro', 1, null)) 'dinheiro' FROM `payment` WHERE created_At BETWEEN current_date()-'$day' AND current_date() AND status_order <> 'cancel'");
            $stmt->execute();

            $result = $stmt->fetchAll();

            echo  json_encode($result);
        }

    }
    

    $report = new Reports;

    $dia = $_POST["day"];
  
    $tipo = $_POST["type"]?$_POST["type"]:'[Não informado]';


    if (isset($dia) && $tipo == 'products') {
        $report->SellsDaysReport($dia);
    }else if (isset($dia) && $tipo == 'getorders') {
        $report->getamountorders($dia);
    } else {
        $report->getpayment($dia);
    }
    

?>