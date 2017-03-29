<?php
foreach ($dtResults as $result) {
    $link = '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('action' => 'view', $result['IndicadoresAno']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['IndicadoresAno']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $result['IndicadoresAno']['id']), array('escape' => false), __('Deseja remover o registro # %s?', $result['IndicadoresAno']['ano']));
    $this->dtResponse['aaData'][] = array(
  		$result['IndicadoresAno']['ano'],
  		$result['IndicadoresAno']['metas'],
  		$result['IndicadoresAno']['conclusoes'],
        $link
    );
}