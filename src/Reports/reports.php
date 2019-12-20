<?php
  // include autoloader
  require_once 'dompdf/autoload.inc.php';

  // reference the Dompdf namespace
  use Dompdf\Dompdf;

  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  $dompdf->loadHtml('hello world');


  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF to Browser
  $dompdf->stream(
    'relatorio.pdf',
    array(
      "Attachment" => false
    )
  );

?>