<?php
    $questionario = array();
    foreach($perguntasLevantamentos as $pergunta){
        $questionario[$pergunta['TiposPerguntasLevantamento']['nome']][] = $pergunta['PerguntasLevantamento'];
    }
    $respostasCheckek = array();
    $idPerguntasRespostas = array();
    foreach($respostas as $resposta){
      $respostasCheckek[$resposta['RespostasLevantamento']['pergunta_levantamento_id']] = $resposta['RespostasLevantamento']['pergunta_levantamento_id'];
      $idPerguntasRespostas[$resposta['RespostasLevantamento']['tipo_pergunta_levantamento_id']] = $resposta['RespostasLevantamento']['id'];
    }
?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
        <h1 class="page-header">Questionário IMGI - Cliente: <?=$cliente['Cliente']['razao_social']?></h1>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Atualização - Preenchido em <?=$this->Util->format_date($respostas[0]['RespostasLevantamento']['created'])?></h4>
    				    <ul class="links">
                            <li><a href="javascript:history.back(1);" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php
                            echo $this->Form->create('RespostasLevantamento', array('role' => 'form'));
                            echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value'=>$cliente['Cliente']['id']));
                            echo $this->Form->input('chave', array('type' => 'hidden', 'value'=>$respostas[0]['RespostasLevantamento']['chave']));
                            echo $this->Form->input('user_id', array('type' => 'hidden', 'value'=>$respostas[0]['RespostasLevantamento']['user_id']));
                            echo $this->Form->input('created', array('type' => 'hidden', 'value'=>$this->Util->format_date2($respostas[0]['RespostasLevantamento']['created'])));

                            foreach($questionario as $grupo=>$perguntas):
                        ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4><?=$grupo?></h4>
            			            </div>
                                    <div class="panel-body">
                                        <?php
                                            foreach($perguntas as $pergunta):
                                                $checked = '';
                                                if(isset($respostasCheckek[$pergunta['id']])){
                                                    $checked = 'checked="checked"';
                                                }
                                                if(isset($idPerguntasRespostas[$pergunta['tipo_pergunta_levantamento_id']])){
                                                    $id = $idPerguntasRespostas[$pergunta['tipo_pergunta_levantamento_id']];
                                                }else{
                                                    $id = NULL;
                                                }
                                        ?>
                                                <div class="radio">
                                                    <label>
                                                        <input <?=$checked?> type="radio" value="<?=$id?>#<?=$pergunta['id']?>#<?=$pergunta['peso']?>" id="<?=$pergunta['tipo_pergunta_levantamento_id']?>" name="data[RespostasLevantamento][Respostas][<?=$pergunta['tipo_pergunta_levantamento_id']?>][resposta]" required><?=$pergunta['pergunta']?>
                                                    </label>
                                                </div>
                                        <?php
                                            endforeach;
                                        ?>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        ?>
          				<button class="btn btn-primary" type="submit">Salvar</button>
          			    <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>