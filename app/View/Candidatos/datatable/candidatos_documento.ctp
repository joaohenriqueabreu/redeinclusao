<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'candidatos_documentos', 'action' => 'edit', $result['CandidatosDocumento']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'candidatos_documentos', 'action' => 'delete', $result['CandidatosDocumento']['id']), array('escape' => false), __('Deseja remover o documento # %s?', $result['CandidatosDocumento']['arquivo']));
    $arquivo = '';
    if(!empty($result['CandidatosDocumento']['arquivo'])){
        $arquivo = $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/candidatos_documento/arquivo/'.$result['CandidatosDocumento']['dir'].'/'.$result['CandidatosDocumento']['arquivo'], array('target'=>'_blank', 'escape' => false));
    }
    $this->dtResponse['aaData'][] = array(
  		$result['CandidatosDocumento']['descricao'],
  		$arquivo,
  		$result['User']['nome'],
  		$result['CandidatosDocumento']['created'],
        $link
    );
}