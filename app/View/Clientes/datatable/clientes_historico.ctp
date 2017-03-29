<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'clientes_historicos', 'action' => 'edit', $result['ClientesHistorico']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'clientes_historicos', 'action' => 'delete', $result['ClientesHistorico']['id']), array('escape' => false), __('Deseja remover o histórico # %s?', $result['ClientesHistorico']['data']));
    $arquivo = '';
    if(!empty($result['ClientesHistorico']['arquivo'])){
        $arquivo = $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/clientes_historico/arquivo/'.$result['ClientesHistorico']['dir'].'/'.$result['ClientesHistorico']['arquivo'], array('target'=>'_blank', 'escape' => false));
    }
    $this->dtResponse['aaData'][] = array(
  		$result['ClientesHistorico']['data'],
  		nl2br($result['ClientesHistorico']['descricao']),
  		$arquivo,
  		$result['User']['nome'],
  		$result['ClientesHistorico']['created'],
        $link
    );
}