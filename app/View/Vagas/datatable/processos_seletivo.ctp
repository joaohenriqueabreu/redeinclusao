<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'processos_seletivos', 'action' => 'edit', $result['ProcessosSeletivo']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'processos_seletivos', 'action' => 'delete', $result['ProcessosSeletivo']['id']), array('escape' => false), __('Deseja remover o candidato %s processo ?', $result['Candidato']['nome']));
    $this->dtResponse['aaData'][] = array(
    	$result['Candidato']['nome'],
    	$this->Util->resultadoEtapasProcesso($result['ProcessosSeletivo']['entrevista_triagem']),
    	$this->Util->resultadoEtapasProcesso($result['ProcessosSeletivo']['entrevista_psicologica']),
    	$this->Util->resultadoEtapasProcesso($result['ProcessosSeletivo']['entrevista_tecnica']),
    	$this->Util->resultadoEtapasProcesso($result['ProcessosSeletivo']['teste_psicologica']),
    	$this->Util->resultadoEtapasProcesso($result['ProcessosSeletivo']['exame_medico_admissional']),
        $this->Util->resultadoProcesso($result['ProcessosSeletivo']['resultado']),
    	$result['ProcessosSeletivo']['observacoes'],
        $link
    );
}