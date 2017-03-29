<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller'=>'contratos', 'action' => 'view', $result['Contrato']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'contratos', 'action' => 'edit', $result['Contrato']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'contratos', 'action' => 'delete', $result['Contrato']['id']), array('escape' => false), __('Deseja remover o contato # %s?', $result['Contrato']['id']));
    $arquivo = '';
    if(!empty($result['Contrato']['anexo'])):
        $arquivo = $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/contrato/anexo/'.$result['Contrato']['id'].'/'.$result['Contrato']['anexo'], array('target'=>'_blank', 'escape' => false));
    endif;
    $this->dtResponse['aaData'][] = array(
  		$result['Contrato']['data'],
  		$result['Contrato']['inicio_vigencia'].' - '.$result['Contrato']['termino_vigencia'],
  		$result['Contrato']['numero_cota'],
        $arquivo,
  		$this->Util->statusContrato($result['Contrato']['status']),
  		$result['Contrato']['investimento'],
        $link
    );
}