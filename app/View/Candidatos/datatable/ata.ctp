<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'atas_candidatos', 'action' => 'view', $result['AtasCandidato']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'atas_candidatos', 'action' => 'edit', $result['AtasCandidato']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$this->Util->tiposAtas($result['AtasCandidato']['tipo']),
  		$result['AtasCandidato']['titulo'],
  		$result['AtasCandidato']['data'],
  		$result['User']['nome'],
  		$result['AtasCandidato']['created'],
        $link
    );
}