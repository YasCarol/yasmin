<?php
use NFePHP\NFe\Make;


class NFeService {

    
    private $config;

    public function __construct($config){ 
        $config = [
            //"atualizacao" => "2015-10-02 06:01:21",
            "tpAmb" => 1,
            "razaosocial" => "JR TRANSPORTES",
            "siglaUF" => "PB",
            "cnpj" => "11507592000159",
            "schemes" => "PL_009_V4",
            "versao" => "4.00",
            //"tokenIBPT" => "anIyMDIx",
            //"CSC" => "GPB0JBWLUR6HWFTVEAS6RJ69GPCROFPBBB8G",
            //"CSCid" => "000002"
        ];
        $json = json_encode($config);
        $this->config = $config; //
        echo "ok";
    }
    public function gerarNFe($InNfe, $Ide, $Emit, $EnderEmit, $Dest, $EnderDest, $Aut,  $Prod,  $Imposto, $Icms, $Pis, $Confins, $Total, $transp, $transportadora, $Pag, $DetalhePag, $InfAdic, $ObsCont, $Compra  ){ //essa funcao vai ser chamada onde?
    
    $nfe = new Make();// falta instanciar essa classe


    /** INF Nfe **/ 
    $stdInNfe = new stdClass();
    $stdInNfe->versao = '4.00'; 
    $stdInNfe->Id = 'NFe35150271780456000160550010000000021800700082'; //se o Id de 44 digitos não for passado será gerado automaticamente
    $stdInNfe->pk_nItem = null; //deixe essa variavel sempre como NULL
    
    $InNfe = $nfe-> taginfNFe($stdInNfe);

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

    $Ide= $nfe-> tagide($stdIde);// AQUI

    /** EMITENTE **/
    $stdEmit = new stdClass();
    $stdEmit->xNome = 'DISTRIBUIDORA DE MEDICAMENTOS SANTA CRUZ LTDA';
    $stdEmit->xFant = 'CRUZ' ;
    $stdEmit->IE = '0627655890101';
    $stdEmit->CRT = 3 ;
    $stdEmit->CNPJ = 61940292001290; 

    $Emit= $nfe->tagemit($stdEmit);   

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

    $EnderEmit= $nfe->tagenderEmit($stdEnderEmit);

    /** DESTINATARIO **/
    $stdDest = new stdClass();
    $stdDest->xNome = 'DROGARIA CARVALHO EIRELI';
    $stdDest->CNPJ = '41042242000125';
    $stdDest->indIEDest = 1;
    $stdDest->IE = '0039861110003';
    
    $Dest = $nfe->tagdest($stdDest);

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
    
    $EnderDest = $nfe->tagenderDest($stdEnderDest);

    /**AUTORIZACAO **/
    $stdAut= new stdClass();
    $stdAut->CNPJ = '16907746000113';
    $stdAut->CPF = null;

    $Aut = $nfe-> tagautXML($stdAut);

    /**PRODUTO **/
    $stdProd = new stdClass();
    $stdProd->item = 1;
    $stdProd->cProd = '713838';
    $stdProd->cEAN = '7891000284933';
    $stdProd->cBarra = '';
    $stdProd->xProd = '';
    $stdProd->NCM = '19011010';
    $stdProd->cBenef = '';
    $stdProd->EXTIPI = '';
    $stdProd->CFOP = '5405';
    $stdProd->uCom = 'CX';
    $stdProd->qCom = '1.0000';
    $stdProd->vUnCom = '15.2000';
    $stdProd->vProd = '15.20';
    $stdProd->cEANTrib = '7891000284933';
    $stdProd->cBarraTrib = '';
    $stdProd->uTrib = 'CX';
    $stdProd->qTrib = '1.0000';
    $stdProd->vUnTrib = '15.2000';
    $stdProd->vFrete = '0.89';
    $stdProd->vSeg = '';
    $stdProd->vDesc = '';
    $stdProd->vOutro = '';
    $stdProd->indTot = '1';
    $stdProd->xPed = '200821131146';
    $stdProd->nItemPed = '';
    $stdProd->nFCI = '';
    
   $Prod = $nfe->tagprod($stdProd);    
   
   /**IMPOSTO **/
   $stdImposto = new stdClass();
   $stdImposto->item = 1; 
   $stdImposto->vTotTrib = 1000.00;
   
   $Imposto = $nfe->tagimposto($stdImposto);

   /**ICMS **/
   $stdIcms = new stdClass();
   $stdIcms->item = 1; 
   $stdIcms->orig = '0';
   $stdIcms->CST = '60';
   $stdIcms->vBCSTRet = '0.00';
   $stdIcms->pST = '0.00';
   $stdIcms->vICMSSTRet = '0.00';
   $stdIcms->vICMSSubstituto = '0.00';
   
   $Icms = $nfe->tagICMS($stdIcms);
  
    /**PIS **/
    $stdPis = new stdClass();
    $stdPis->item = 1; 
    $stdPis->CST = '04';
    $stdPis->vBC = null;
    $stdPis->pPIS = null;
    $stdPis->vPIS = null;
    $stdPis->qBCProd = null;
    $stdPis->vAliqProd = null;
    
    $Pis = $nfe->tagPIS($stdPis);
    
    /**CONFINS **/
    $stdConfins = new stdClass();
    $stdConfins->item = 1; //item da NFe
    $stdConfins->CST = '04';
    $stdConfins->vBC = null;
    $stdConfins->pCOFINS = null;
    $stdConfins->vCOFINS = null;
    $stdConfins->qBCProd = null;
    $stdConfins->vAliqProd = null;
    
    $Confins = $nfe->tagCOFINS($stdConfins);
 
    /**TOTAL **/
    $stdTotal = new stdClass();
    $stdTotal->vBC = 0.00;
    $stdTotal->vICMS = 0.00;
    $stdTotal->vICMSDeson = 0.00;
    $stdTotal->vFCP = 0.00; 
    $stdTotal->vBCST = 0.00;
    $stdTotal->vST = 0.00;
    $stdTotal->vFCPST = 0.00; 
    $stdTotal->vFCPSTRet = 0.00;
    $stdTotal->vProd = 15.20;
    $stdTotal->vFrete = 0.00;
    $stdTotal->vSeg = 0.00;
    $stdTotal->vDesc = 0.89;
    $stdTotal->vII = 0.00;
    $stdTotal->vIPI = 0.00;
    $stdTotal->vIPIDevol = 0.00;
    $stdTotal->vPIS = 0.00;
    $stdTotal->vCOFINS = 0.00;
    $stdTotal->vOutro = 0.00;
    $stdTotal->vNF =14.31;
    $stdTotal->vTotTrib = 0.00;
    
    $Total = $nfe->tagICMSTot($stdTotal);

    /**TRANSP **/
    $stdTransp = new stdClass();
    $stdTransp->modFrete = 0;
    
    $transp = $nfe->tagtransp($stdTransp);

    /**TRANSPORTADORA **/
    $stdTransportadora = new stdClass();
    $stdTransportadora->xNome = 'TRANSPAPER TRANSPORTES LTDAo';
    $stdTransportadora->IE = '2779782910092';
    $stdTransportadora->xEnder = 'R AFONSO PENA3696';
    $stdTransportadora->xMun = 'GOVERNADOR VALADARES';
    $stdTransportadora->UF = 'MG';
    $stdTransportadora->CNPJ = '01248648000144';
    
    $transportadora = $nfe->tagtransporta($stdTransportadora);

    /**PAGAMENTO   **/
    $stdPag = new stdClass();
    $stdPag->vTroco = 0.00; 
       
    $Pag = $nfe->tagpag($stdPag);
    
    /**DETALHE PAG **/
    $stdDetpag = new stdClass();
    $stdDetpag->tPag = '15';
    $stdDetpag->vPag = 14.31;
    //$stdDetpag->CNPJ = '12345678901234';
    //$stdDetpag->tBand = '01';
    //$stdDetpag->cAut = '3333333';
    //$stdDetpag->tpIntegra = 1; //incluso na NT 2015/002
   // $stdDetpag->indPag = '0'; //0= Pagamento à Vista 1= Pagamento à Prazo
    
    $DetalhePag = $nfe->tagdetPag($stdDetpag);

    /**INFORMACOES ADICIONAIS **/
    $stdInfAdic = new stdClass();
    $stdInfAdic->infAdFisco = 'informacoes para o fisco';
    $stdInfAdic->infCpl = 'L09109 Rota: 458/372 Set: 00563 NF: 0000089459 Aut.Func.:1.03.129-5 -Aut.Esp.Func.:1.20.475-5 Lic.Sanit: 2018038601 PRACA DE PAGAMENTO: SAO PAULO-SP ICMS ST DEC. 45688/11 ST CFME DEC 44823/08 E 44147/05 PAFS NO 9365 27/04/2012-380971841 A 381251840 Lic.Sanit.Cliente:0012/2021 N.Pedido Cliente: 200821131146 / Picklist: 0249965-06 / Oferta: 81XXX N.Pedido Cliente: 200821131146 / Picklist: 0249965-06 / Oferta: 81XXX;</';
    
    $InfAdic = $nfe->taginfAdic($stdInfAdic);

    /**OBS CONTRIBUENTE **/
    $stdObsCont = new stdClass();
    $stdObsCont->xCampo = 'Cod.Cliente:L09109';
    $stdObsCont->xTexto = 'Pedido:200821131146';
    
    $ObsCont = $nfe->tagobsCont($stdObsCont);

    /**COMPRA **/
    $stdCompra = new stdClass();
    $stdCompra->xPed = '200821131146';
    
    $Compra = $nfe->tagcompra($stdCompra);

    //Monta xml
    if ($nfe->montaNFe){
        return  $xml = $nfe->monta();
    }else
    throw new Exception("Erro ao gerar NFe");

 }
} 