<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('action' => 'view', $result['Cliente']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['Cliente']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['Cliente']['razao_social'],
  		$result['Cliente']['telefone'],
  		$this->Util->classeCliente($result['Cliente']['classe']),
  		$this->Util->mostraStatusCliente($result['Cliente']['status']),
  		($result['Cliente']['ativo'] == 'S') ? 'Sim' : 'Não',
        $link
    );
}