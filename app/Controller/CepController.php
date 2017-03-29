<?php
class CepController extends AppController{

    var $uses = array();

    function beforeFilter() {
        parent::BeforeFilter();
        $this->Auth->allowedActions = array('busca');
    }

    function busca($cep=null){
        Configure::write('debug', 0);
        $this->autoRender=false;
        if(isset($cep)){
            header("Content-Type:text/xml");
            $xml = file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.$cep.'&formato=xml');
            $xml = new SimpleXMLElement($xml);

            $resultado = $xml->resultado;
            $uf = $xml->uf;
            $cidade = $xml->cidade;
            $bairro = $xml->bairro;
            $logradouro = $xml->logradouro;
            $tipo_logradouro = $xml->tipo_logradouro;
            $xmlString = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><endereco></endereco>');

            $xmlString->addChild('resultado',$resultado);
            $xmlString->addChild('uf',$uf);
            $xmlString->addChild('cidade',$cidade);
            $xmlString->addChild('bairro',$bairro);
            $xmlString->addChild('logradouro',$tipo_logradouro.' '.$logradouro);
            return $xmlString->asXML();
    	    exit;
        }
    } 
}
?>