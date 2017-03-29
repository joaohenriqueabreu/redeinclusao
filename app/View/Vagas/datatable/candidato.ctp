<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;Incluir'), 'javascript:;', array('id'=>'addProcesso', 'onclick'=>'addProcesso('.$result['Candidato']['id'].')', 'escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'candidatos', 'action' => 'view', $result['Candidato']['id']), array('escape'=>false, 'target'=>'_blank'));
    $this->dtResponse['aaData'][] = array(
  		$result['Candidato']['nome'],
  		$result['Candidato']['data_nascimento'],
  		$result['Candidato']['telefone'].' '.$result['Candidato']['celular_1'],
  		$result['Candidato']['bairro'],
  		$result['Candidato']['cidade'],
  		($result['Candidato']['possui_deficiencia_auditiva'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_fisica'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_intelectual'] == '1')?'Sim':'Não',
  		($result['Candidato']['possui_deficiencia_visual'] == '1')?'Sim':'Não',
        $link
    );
}