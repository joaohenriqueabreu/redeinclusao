<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'clientes_questionarios', 'action' => 'view', $result['ClientesQuestionario']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'clientes_questionarios', 'action' => 'edit', $result['ClientesQuestionario']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'clientes_questionarios', 'action' => 'delete', $result['ClientesQuestionario']['id']), array('escape' => false), __('Deseja remover o questionário # %s?', $result['Questionario']['titulo']));
    $this->dtResponse['aaData'][] = array(
  		$result['Questionario']['titulo'],
  		$result['User']['nome'],
  		$result['ClientesQuestionario']['created'],
        $link
    );
}