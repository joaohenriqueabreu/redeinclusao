<?php
foreach ($dtResults as $result) {
    $link = $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('action' => 'view', $result['PerguntasLevantamento']['id']), array('escape'=>false));
    $link .= '&nbsp;'.$this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $result['PerguntasLevantamento']['id']), array('escape'=>false));
    $this->dtResponse['aaData'][] = array(
  		$result['TiposPerguntasLevantamento']['dimensao_imgi'],
  		$result['TiposPerguntasLevantamento']['nome'],
  		$result['PerguntasLevantamento']['pergunta'],
  		$result['PerguntasLevantamento']['peso'],
  		$this->Util->statusAtivo($result['PerguntasLevantamento']['ativa']),
        $link
    );
}