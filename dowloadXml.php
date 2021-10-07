<?php
require_once 'conn.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once'../nfephp-master/bootstrap.php';

use NFePHP\NFe\ToolsNFe;

$nfe = new ToolsNFe ('../nfephp-master/config/config.json');
$nfe -> setModelo('55');

$read_download = mysqli_query($conexao, "SELECT chNFe FROM WHERE status = '1'");
if (mysqli_num_rows($read_download)> '0'){
    foreach($read_download as $read_dowload_view){
        $chave = '';
        $tpAmb = '1';
        $cnpj = '';
        $aResposta = array();
        $resp = $nfe->sefazDownload($chNFe, $tpAmb, $cnpj, $aResposta);
        $update_manifesta = mysqli_query($conexao, "UPDATE nfe SET status = '1' WHERE chNFe = '".$read_manifesta_view['chNFe']."'"); 
    }
    $json_manifesta = array(
        'type' => 'success',
        'msg' => 'Dados manifestados com sucesso!'
    );
} else{
    $json_manifesta = array(
        'type' => 'error',
        'msg' => 'Nenhum manifesto para ser feito!'
    );=
}

echo $json_encode($json_manifesta);
?>