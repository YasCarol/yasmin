<?php
use NFePHP\NFe\Make;

class NFeService { //tem que criar a classe
    
    private $config;

    public function __construct($config){ 
        $config = [
            "atualizacao" => "2015-10-02 06:01:21",
            "tpAmb" => 2,
            "razaosocial" => "Fake Materiais de construção Ltda",
            "siglaUF" => "SP",
            "cnpj" => "00716345000119",
            "schemes" => "PL_008i2",
            "versao" => "3.10",
            "tokenIBPT" => "AAAAAAA",
            "CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            "CSCid" => "000002"
        ];
        $json = json_encode($config);
        $this->config = $config; //
    }
    public function gerarNFe(){ //essa funcao vai ser chamada onde?
    
    $nfe = new Make();// falta instanciar essa classe

    /** INF Nfe **/ 
    $stdInNfe = new stdClass();
    $stdInNfe->versao = '4.00'; 
    $stdInNfe->Id = 'NFe35150271780456000160550010000000021800700082'; //se o Id de 44 digitos não for passado será gerado automaticamente
    $stdInNfe->pk_nItem = null; //deixe essa variavel sempre como NULL
    
    $stdInNfe = $nfe-> taginfNFe($stdInNfe);

    /** IDE **/
    $stdIde = new stdClass();//AQUI
    $stdIde->cUF = 35;
    $stdIde->cNF = '80070008';
    $stdIde->natOp = 'VENDA';
    $stdIde->mod = 55;  
    $stdIde->serie = 34;
    $stdIde->nNF = 89459;
    $stdIde->dhEmi = '2021-08-20T23:58:00-03:00';
    $stdIde->dhSaiEnt = '2021-08-21T00:48:16-03:00';
    $stdIde->tpNF = 1;
    $stdIde->idDest = 1;
    $stdIde->cMunFG = 3106200;
    $stdIde->tpImp = 1;
    $stdIde->tpEmis = 1;
    $stdIde->cDV = 7;
    $stdIde->tpAmb = 1;
    $stdIde->finNFe = 1;
    $stdIde->indFinal = 0;
    $stdIde->indPres = 9;
    $stdIde->indIntermed = null;
    $stdIde->procEmi = 0;
    $stdIde->verProc = 'NDDigital NFe 4.8.5';
    $stdIde->dhCont = null;
    $stdIde->xJust = null;

    $stdIde= $nfe-> tagide($stdIde);// AQUI

    /** EMITENTE **/
    $stdEmit = new stdClass();
    $stdEmit->xNome = 'DISTRIBUIDORA DE MEDICAMENTOS SANTA CRUZ LTDA';
    $stdEmit->xFant = 'CRUZ' ;
    $stdEmit->IE = '0627655890101';
    $stdEmit->CRT = 3 ;
    $stdEmit->CNPJ = 61940292001290; //indicar apenas um CNPJ ou CPF

    $stdEmit= $nfe->tagemit($stdEmit);   

    /** ENDEREÇO EMITENTE **/
    $stdEnderEmit = new stdClass();
    $stdEnderEmit->xLgr = 'R.Dr. Alvaro Camargos';
    $stdEnderEmit->nro = '604';
    $stdEnderEmit->xCpl = '';
    $stdEnderEmit->xBairro = 'Sao Joao Batista';
    $stdEnderEmit->cMun = '3106200';
    $stdEnderEmit->xMun = 'Belo Horizonte';
    $stdEnderEmit->UF= 'MG';
    $stdEnderEmit->CEP = '31515200';
    $stdEnderEmit->cPais = '1058';
    $stdEnderEmit->xPais = 'BRASIL';
    $stdEnderEmit->fone = '3134592800';

    $stdEnderEmit= $nfe->tagenderEmit($stdEnderEmit);

    /** DESTINATARIO **/
    $stdDest = new stdClass();
    $stdDest->xNome = 'DROGARIA CARVALHO EIRELI';
    $stdDest->CNPJ = '41042242000125';
    $stdDest->indIEDest = 1;
    $stdDest->IE = '0039861110003';
    
    $stdDest = $nfe->tagdest($stdDest);

    /**ENDEREÇO DESTINATARIO **/
    $stdEnderDest = new stdClass();
    $stdEnderDest->xLgr = 'AV ANA CABURE';
    $stdEnderDest->nro = '1880';
    $stdEnderDest->xBairro = 'CENTRO';
    $stdEnderDest->cMun = '3152170';
    $stdEnderDest->xMun = 'PONTO DOS VOLANTES';
    $stdEnderDest->UF = 'MG';
    $stdEnderDest->CEP = '39615000';
    $stdEnderDest->cPais = '1058';
    $stdEnderDest->xPais = 'BRASIL';
    
    $stdEnderDest = $nfe->tagenderDest($stdEnderDest);

    /**AUTORIZACAO **/
    $stdAut= new stdClass();
    $stdAut->CNPJ = '16907746000113';
    $stdAut->CPF = null;

    $stdAut = $nfe-> tagautXML($stdAut);

    /**AUTORIZACAO **/


 }
} 