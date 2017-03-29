<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'vagas', 'action' => 'view', $result['Vaga']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'vagas', 'action' => 'edit', $result['Vaga']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['Vaga']['cargo'],
  		$result['Vaga']['numero_vagas'],
  		$this->Formatacao->moeda($result['Vaga']['salario']),
  		$this->Util->sexo($result['Vaga']['sexo']),
        ($result['Vaga']['deficiencia_auditiva'] == 'S')?'Sim':'Não',
        ($result['Vaga']['deficiencia_fisica'] == 'S')?'Sim':'Não',
        ($result['Vaga']['deficiencia_intelectual'] == 'S')?'Sim':'Não',
        ($result['Vaga']['deficiencia_visual'] == 'S')?'Sim':'Não',
  		$this->Util->statusVaga($result['Vaga']['status']),
        $link
    );
}