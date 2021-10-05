<?php
use Dompdf\Dompdf;

require_once 'dompdf/autoload.inc.php';
//instanciar a classe dompdf
$dompdf= new Dompdf();
$dompdf->loadHtml('
<h1> Primeiro exemplo PDF - PHP </h1>
<p> Esse exemplo de paragrafo em HTML kkkk</p>
');

//Redenrização do HTML
$dompdf->render();

//Gerar a saída do documento PDF
$dompdf-> stream(
    "Relatorio",  //nome do arquivo
    array(
        "Attachment"=> false
    )
);
?>
