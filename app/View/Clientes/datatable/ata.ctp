<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('controller'=>'atas', 'action' => 'view', $result['Ata']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller'=>'atas', 'action' => 'edit', $result['Ata']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-print"></span>'), 'javascript:abreJanela("'.$this->base.'/atas/impressao/'.$result['Ata']['id'].'");', array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$this->Util->tiposAtas($result['Ata']['tipo']),
  		$result['Ata']['titulo'],
  		$result['Ata']['data'],
  		$result['Ata']['repsonsavel_contato'],
  		$result['User']['nome'],
        $link
    );
}