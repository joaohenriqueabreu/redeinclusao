<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['Colaborador']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $result['Colaborador']['id']), array('escape'=>false), __('Deseja remover o colaborador # %s?', $result['Colaborador']['nome']));
    $this->dtResponse['aaData'][] = array(
        $result['Colaborador']['nome'],
        $result['Cargo']['nome'],
        $this->Util->statusAtivo($result['Colaborador']['ativo']),
        $link
    );
}