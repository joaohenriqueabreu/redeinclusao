<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['ProcessosSeletivo']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'processos_seletivos', 'action' => 'delete', $result['ProcessosSeletivo']['id']), array('escape' => false), __('Deseja remover o candidato do processo da vaga %s?', $result['Vaga']['cargo']));
    $this->dtResponse['aaData'][] = array(
    	$this->Util->mostraNomeCliente($result['Vaga']['cliente_id']),
    	$result['Vaga']['cargo'],
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