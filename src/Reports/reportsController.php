<?php

    include_once "../includes/conection.php";

    class Reports {

        public function sevenDaysReport() {
            
            $con = getConnection();

            $stmt = $con->prepare("SELECT * FROM orders WHERE created_At BETWEEN current_date()-7 AND current_date()");
            $stmt->execute();

            $result = $stmt->fetchAll();

            $total = 0;

            for ($i=0; $i < count($result); $i++) { 
                if ($result[$i]["status"] != "cancel") {
                    $total += $result[$i]["total"];
                }
            }

            $result[] = array(
                "0" => $total,
                "total" => $total
            );

            echo json_encode($result);
            
        }
    }
    

    $report = new Reports;

    $report->sevenDaysReport();

?>