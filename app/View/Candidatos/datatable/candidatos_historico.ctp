<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'candidatos_historicos', 'action' => 'edit', $result['CandidatosHistorico']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'candidatos_historicos', 'action' => 'delete', $result['CandidatosHistorico']['id']), array('escape' => false), __('Deseja remover o histórico # %s?', $result['CandidatosHistorico']['data']));
    $arquivo = '';
    if(!empty($result['CandidatosHistorico']['arquivo'])){
        $arquivo = $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/candidatos_historico/arquivo/'.$result['CandidatosHistorico']['dir'].'/'.$result['CandidatosHistorico']['arquivo'], array('target'=>'_blank', 'escape' => false));
    }
    $this->dtResponse['aaData'][] = array(
  		$result['CandidatosHistorico']['data'],
  		$result['CandidatosHistorico']['descricao'],
  		$arquivo,
  		$result['User']['nome'],
  		$result['CandidatosHistorico']['created'],
        $link
    );
}