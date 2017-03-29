<?php
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
        <?php
        foreach($this->data['RespostasCliente'] as $resposta){
            if(!empty($resposta['alternativa_id']) and !empty($resposta['opcao_id'])){
        ?>
                $('#Opcao<?=$resposta['alternativa_id']?>-<?=$resposta['opcao_id']?>').attr('checked', true);
        <?php
            }elseif(!empty($resposta['opcao_id'])){
        ?>
                $('#Opcao<?=$resposta['opcao_id']?>').attr('checked', true);
        <?php
            }else{
        ?>
                $('#Resposta<?=$resposta['pergunta_id']?>').val('<?=nl2br($resposta['resposta'])?>');
        <?php
            }
         }
        ?>
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
                        <h4>Editar - <?=$this->data['Questionario']['titulo']?></h4>
    				    <ul class="links">
                            <li><a href="javascript:history.back(1);" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a></li>
                            <li><?php echo $this->Html->link(__('Imprimir'), array('controller'=>'clientes_questionarios', 'action' => 'imprimir', $this->data['ClientesQuestionario']['id']), array('target'=>'blank')); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $this->Form->value('ClientesQuestionario.id'), $this->Form->value('ClientesQuestionario.cliente_id')), array('escape'=>false), __('Deseja remover o questionário # %s?', $this->Form->value('Questionario.titulo'))); ?> </li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('ClientesQuestionario', array('role' => 'form')); ?>
                        <p><b><?=$this->data['Questionario']['descricao']?></b></p>
                        <div class="row no-gutter">
                        	<?php
                                echo $this->Form->input('id');
                                echo $this->Form->input('cliente_id', array('type'=>'hidden'));
                                if(!empty($this->data['Questionario']['Pergunta'])):
                                    foreach($this->data['Questionario']['Pergunta'] as $pergunta):
                            ?>
                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                            <p><?=$pergunta['ordem']?> - <?=$pergunta['titulo'].' - '.$pergunta['tipo_pergunta_id']?></p>
                                            <div class="form-group">
                                                <?php
                                                    switch($pergunta['tipo_pergunta_id']){
                                                        case 1:
                                                            foreach($pergunta['Opcao'] as $opcao){
                                                                echo '
                                                                    <div class = "radio">
                                                                        <label>
                                                                            <input type = "radio" id = "Opcao'.$opcao['id'].'" value = "'.$opcao['id'].'" name = "data[Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                                                        </label>
                                                                    </div>
                                                                ';
                                                            }
                                                        break;
                                                        case 2:
                                                            foreach($pergunta['Opcao'] as $opcao){
                                                                echo '
                                                                    <div class = "checkbox">
                                                                        <label>
                                                                            <input type = "checkbox" id = "Opcao'.$opcao['id'].'" value = "'.$opcao['id'].'" name = "data[Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                                                        </label>
                                                                    </div>
                                                                ';
                                                            }
                                                        break;
                                                        case 3:
                                                            echo $this->Form->input('resposta', array('label'=>false, 'id'=>'Resposta'.$pergunta['id'], 'class'=>'form-control', 'type'=>'text', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]'));
                                                        break;
                                                        case 4:
                                                            echo $this->Form->input('resposta', array('label'=>false, 'id'=>'Resposta'.$pergunta['id'], 'class'=>'form-control', 'type'=>'textarea', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]'));
                                                        break;
                                                        case 5:
                                                            echo $this->Form->input('resposta', array('label'=>false, 'id'=>'Resposta'.$pergunta['id'], 'class'=>'form-control', 'type'=>'text', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]', 'onkeypress'=>'return OnlyNumbers(event)'));
                                                        break;
                                                        case 6:
                                                            foreach($pergunta['Alternativa'] as $alternativa){
                                                                echo '<label class = "bold">'.$alternativa['nome'].'</label>';
                                                                foreach($pergunta['Opcao'] as $opcao){
                                                                    echo '
                                                                        <div class = "radio">
                                                                            <label>
                                                                                <input type = "radio" id = "Opcao'.$alternativa['id'].'-'.$opcao['id'].'" value = "'.$opcao['id'].'" name = "data[Alternativa]['.$alternativa['id'].'][Opcao]['.$pergunta['id'].'][][resposta]">'.
                                                                                $opcao['nome']
                                                                            .'</label>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                        break;
                                                        case 7:
                                                            foreach($pergunta['Alternativa'] as $alternativa){
                                                                echo '<label>'.$alternativa['nome'].'</label>';
                                                                foreach($pergunta['Opcao'] as $opcao){
                                                                    echo '
                                                                        <div class = "checkbox">
                                                                            <label>
                                                                                <input type = "checkbox" id = "Opcao'.$alternativa['id'].'-'.$opcao['id'].'" value = "'.$opcao['id'].'" name = "data[Alternativa]['.$alternativa['id'].'][Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                                                            </label>
                                                                        </div>
                                                                    ';
                                                                }
                                                            }
                                                        break;
                                                    }
                                                ?>
                				            </div>
                				        </div>
                            <?php
                                    endforeach;
                                endif
                            ?>
				        </div>
					    <button class="btn btn-primary" type="submit">Salvar</button>
			            <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>