<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('action' => 'view', $result['Parceiro']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['Parceiro']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$this->Util->categoriaParceiro($result['Parceiro']['categoria']),
  		$result['Parceiro']['nome'],
  		$result['Parceiro']['telefone_1'].' '.$result['Parceiro']['telefone_2'],
  		($result['Parceiro']['ativo'] == 'S') ? 'Sim' : 'Não',
        $link
    );
}