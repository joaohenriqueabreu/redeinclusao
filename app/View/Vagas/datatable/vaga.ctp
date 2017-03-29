<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'vagas', 'action' => 'view', $result['Vaga']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'vagas', 'action' => 'edit', $result['Vaga']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['Cliente']['razao_social'],
  		$result['Vaga']['cargo'],
  		$result['Vaga']['numero_vagas'],
  		$this->Formatacao->moeda($result['Vaga']['salario']),
  		$this->Util->sexo($result['Vaga']['sexo']),
  		$this->Util->statusVaga($result['Vaga']['status']),
  		$result['Vaga']['created'],
        $link
    );
}