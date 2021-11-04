<?php
require 'vendor/autoload.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

use NFePHP\DA\NFe\Danfe;
use NFePHP\NFe\Tools;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;

try {
    $arr = [

        "tpAmb"       => 1,
        "razaosocial" => "TRANS SOARES",
        "cnpj"        => "11011161000288",
        "siglaUF"     => "PI",
        "schemes"     => "PL_009_V4",
        "versao"      => '4.00',

    ];
    $configJson = json_encode($arr);
    $content = file_get_contents('11011161000288.pfx');
    $tools = new Tools($configJson, Certificate::readPfx($content, '1234'));
    $tools->model('55');
    $chave = '21210907224991000640550010047307221026944579';
    $response = $tools->sefazDownload($chave);
    $stz = new Standardize($response);
    $std = $stz->toStd();
    if ($std->cStat != 138) {
        return ["status" => true, "mensagem" => "Documento não retornado. [$std->cStat] $std->xMotivo"];
    }
    $zip = $std->loteDistDFeInt->docZip;
    $xml = gzdecode(base64_decode($zip));
    header('Content-type: text/xml; charset=UTF-8');
$danfe = new Danfe($xml);
$pdf = $danfe->render($logo);
header('Content-Type: application/pdf');
echo $pdf; 
    
} catch (\Exception $e) {
    echo str_replace("\n", "<br/>", $e->getMessage());
}
