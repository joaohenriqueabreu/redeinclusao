<?php
    $questionario = array();
    foreach($perguntasLevantamentos as $pergunta){
        $questionario[$pergunta['TiposPerguntasLevantamento']['nome']][] = $pergunta['PerguntasLevantamento'];
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
                        <h4>Preenchimento</h4>
    				    <ul class="links">
                            <li><a href="javascript:history.back(1);" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php
                            echo $this->Form->create('RespostasLevantamento', array('role' => 'form'));
                            echo $this->Form->input('cliente_id', array('type' => 'hidden', 'value'=>$cliente['Cliente']['id']));

                            foreach($questionario as $grupo=>$perguntas):
                        ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4><?=$grupo?></h4>
            			            </div>
                                    <div class="panel-body">
                                        <?php
                                            foreach($perguntas as $pergunta):
                                        ?>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="<?=$pergunta['id']?>#<?=$pergunta['peso']?>" id="<?=$pergunta['tipo_pergunta_levantamento_id']?>" name="data[RespostasLevantamento][Respostas][<?=$pergunta['tipo_pergunta_levantamento_id']?>][resposta]" required><?=$pergunta['pergunta']?>
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