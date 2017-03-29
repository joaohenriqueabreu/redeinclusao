<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'clientes_contatos', 'action' => 'edit', $result['ClientesContato']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'clientes_contatos', 'action' => 'delete', $result['ClientesContato']['id']), array('escape' => false), __('Deseja remover o contato # %s?', $result['ClientesContato']['nome']));
    $this->dtResponse['aaData'][] = array(
  		$result['ClientesContato']['nome'],
  		$result['Cargo']['nome'],
  		$result['ClientesContato']['telefone'],
  		$result['ClientesContato']['celular'],
  		$result['ClientesContato']['email'],
  		$result['ClientesContato']['observacoes'],
  		$result['User']['nome'],
  		$result['ClientesContato']['created'],
        $link
    );
}