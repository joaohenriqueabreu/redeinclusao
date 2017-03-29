<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'projetos', 'action' => 'view', $result['Projeto']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'projetos', 'action' => 'edit', $result['Projeto']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['Projeto']['titulo'],
  		$result['Projeto']['inicio'],
  		$result['Projeto']['termino'],
  		$result['User']['nome'],
  		$result['Projeto']['created'],
        $link
    );
}