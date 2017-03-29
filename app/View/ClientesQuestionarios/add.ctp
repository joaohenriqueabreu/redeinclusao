<?php
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
        $("#ClientesQuestionarioQuestionarioId").change(function(){
            if($(this).val() != ''){
                $('#loading_block').show();
                $.post('<?=$this->base?>/questionarios/mostra_questionario',{'data[Questionario][id]':$(this).val()},function(retorno){
                    $('#loading_block').hide();
                    $('#Questionario').html(retorno);
                });
            }
        });
    });
<?php echo $this->Html->scriptEnd(); ?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h1 class="page-header">Questionários</h1>
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
                        <h4>Adicionar <?=(isset($cliente['Cliente']['razao_social']))?' - '.$cliente['Cliente']['razao_social']:''?></h4>
    				    <ul class="links">
                            <li><a href="javascript:history.back(1);" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('ClientesQuestionario', array('role' => 'form')); ?>
                        <div class="row no-gutter">
                        	<?php
                                echo $this->Form->input('cliente_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
                            ?>
                            <div class="col-lg-12 col-sm-12 col-sx-12">
                                <div class="form-group">
    					            <?php echo $this->Form->input('questionario_id', array('label'=>'Questionário', 'class' => 'form-control', 'empty'=>'Selecione', 'value'=>$questionarios, 'required'=>'required'));  ?>
    				            </div>
    				        </div>
				        </div>
                        <div id = "Questionario"></div>
					    <button class="btn btn-primary" type="submit">Salvar</button>
			            <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>