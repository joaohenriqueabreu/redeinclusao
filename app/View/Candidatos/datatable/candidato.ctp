<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('action' => 'view', $result['Candidato']['id']), array('target' => '_blank', 'escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['Candidato']['id']), array('target' => '_blank', 'escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['Candidato']['nome'],
  		$result['Candidato']['telefone'].' '.$result['Candidato']['celular_1'],
  		($result['Candidato']['sexo'] == 'M')?'Masculino':'Feminino',
  		($result['Candidato']['possui_deficiencia_auditiva'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_fisica'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_intelectual'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_visual'] == '1')?'Sim':'Não',
        $link
    );
}