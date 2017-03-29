<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['ProcessosSeletivo']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'processos_seletivos', 'action' => 'delete', $result['ProcessosSeletivo']['id']), array('escape' => false), __('Deseja remover o candidato do processo da vaga %s?', $result['Vaga']['cargo']));
    $deficiencias = '';
    if($result['Vaga']['deficiencia_auditiva'] == 1){
        $deficiencias .= 'Auditiva | ';
    }
    if($result['Vaga']['deficiencia_fisica'] == 1){
        $deficiencias .= 'Fisíca | ';
    }
    if($result['Vaga']['deficiencia_intelectual'] == 1){
        $deficiencias .= 'Intelectual | ';
    }
    if($result['Vaga']['deficiencia_visual'] == 1){
        $deficiencias .= 'Intelectual  ';
    }
    $this->dtResponse['aaData'][] = array(
    	$this->Util->mostraNomeCliente($result['Vaga']['cliente_id']),
    	$result['Vaga']['cargo'],
    	$result['Candidato']['nome'],
        $this->Util->resultadoProcesso($result['ProcessosSeletivo']['resultado']),
        $deficiencias,
    	$result['ProcessosSeletivo']['observacoes']
    );
}