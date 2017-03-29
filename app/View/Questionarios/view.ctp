<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
	$(document).ready(function() {
        $("#atualizaOrdem").click(function(){
            $('#processing-modal').modal('show');
            $.post('<?php echo $this->base; ?>/perguntas/atualiza_ordem/',$('#atualizaOrdemForm').serialize(),function(retorno){
                 if(retorno!=0){
                     bootbox.alert('Ordem atualizada com sucesso!', function(){
                        $('#processing-modal').modal('hide');
                     });
                }else{
                     bootbox.alert('Registro não foi atualizado. Por favor, tente novamente', function(){
                        $('#processing-modal').modal('hide');
                     });
                }
            });
            return false;
        });
 	});
<?php echo $this->Html->scriptEnd(); ?>
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Questionário</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#cadastro" data-toggle="tab">Cadastro</a></li>
                    <li class=""><a href="#perguntas" data-toggle="tab">Perguntas</a></li>
                </ul>
                <!-- Tab panes -->
                <p style="clear: both"></p>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id = "cadastro">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Visualizar</h4>
                                <ul class="links">
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar'), array('action' => 'add'), array('escape'=>false)); ?></li>
                            		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'), array('action' => 'edit', $questionario['Questionario']['id']), array('escape'=>false)); ?> </li>
                            		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $questionario['Questionario']['id']), array('escape'=>false), __('Deseja remover o questionário # %s?', $questionario['Questionario']['titulo'])); ?> </li>
                            		<li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?> </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                  <div class="col-sm-2">
                                      <label>Cód.</label>
                                      <p><?php echo h($questionario['Questionario']['id']); ?></p>
                                  </div>
                                  <div class="col-sm-10">
                                      <label>Título</label>
                                      <p><?php echo h($questionario['Questionario']['titulo']); ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Descrição</label>
                                        <p><?php echo h($questionario['Questionario']['descricao']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Ativo</label>
                                        <p><?php echo h($questionario['Questionario']['ativo'] == 'S')? 'Sim' : 'Não'; ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Cadastrado em</label>
                                        <p><?php echo h($questionario['Questionario']['created']); ?></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Modificado em</label>
                                        <p><?php echo h($questionario['Questionario']['modified']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id = "perguntas">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Visualizar</h4>
                                <ul class="links">
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar'), array('controller' => 'perguntas', 'action' => 'add', $questionario['Questionario']['id']), array('escape'=>false)); ?></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php if (!empty($questionario['Pergunta'])): ?>
                                    <?php echo $this->Form->create('Pergunta', array('id'=>'atualizaOrdemForm')); ?>
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-index">
                                                <thead>
                                                    <tr>
                                            			<th><?php echo __('Ordem'); ?></th>
                                            			<th><?php echo __('Titulo'); ?></th>
                                            			<th><?php echo __('Cadastrado em'); ?></th>
                                            			<th class="actions"><?php echo __('Actions'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<?php
                                                		$i = 0;
                                                		foreach ($questionario['Pergunta'] as $pergunta):
                                                    ?>
                                                		<tr>
                                                            <td><?php echo $this->Form->input('ordem', array('class' => 'form-control', 'type' => 'text', 'label'=>false, 'style'=>'width:60px', 'div'=>false, 'maxlength'=>'3', 'onkeypress'=>'return OnlyNumbers(event)', 'value'=>$pergunta['ordem'], 'name'=>'data[Pergunta]['.$pergunta['id'].']')); ?></td>
                                                			<td><?php echo $pergunta['titulo']; ?></td>
                                                			<td><?php echo $this->Util->format_date($pergunta['created']); ?></td>
                                                			<td class="actions">
                                                				<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'perguntas', 'action' => 'edit', $pergunta['id']), array('escape'=>false)); ?>
                                                            </td>
                                                		</tr>
                                                	<?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <button type="button" id="atualizaOrdem" class="btn btn-primary">Atualizar Ordem</button>
                                        </div>
                                    <?php echo $this->Form->end(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>