<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('action' => 'view', $result['IndicadoresItem']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['IndicadoresItem']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller'=>'contratos', 'action' => 'delete', $result['IndicadoresItem']['id']), array('escape' => false), __('Deseja remover o registro # %s?', $result['IndicadoresItem']['nome']));
    $this->dtResponse['aaData'][] = array(
  		$result['IndicadoresArea']['nome'],
  		$result['UnidadesMedida']['nome'],
  		$result['IndicadoresItem']['nome'],
        $link
    );
}