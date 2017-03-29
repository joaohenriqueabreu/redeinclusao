<?php echo $this->Html->script('questionario', array('block'=>'customArchives')); ?>
<?php echo $this->Html->script('jquery.validate.min', array('block'=>'customArchives')); ?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
  $(document).ready(function(){
      jQuery.extend(jQuery.validator.messages, {
          required: ""
      });
      $("#PerguntaEditForm").validate({
            submitHandler: function(form) {
                $('#processing-modal').modal('show');
                form.submit();
  		    }
      });
  });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pergunta</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;Remover'), array('controller' => 'perguntas', 'action' => 'delete', $this->data['Pergunta']['id']), array('escape'=>false), __('Deseja remover a pergunta # %s?', $this->data['Pergunta']['titulo'])); ?></li>
                    <li><a href="javascript:window.history.go(-1)" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;Voltar</a></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <?php echo $this->Form->create('Pergunta'); ?>
              <?php echo $this->Form->input('id'); ?>
              <?php echo $this->Form->input('questionario_id',array('type'=>'hidden')); ?>
                <div class="row no-gutter">
                    <div class="col-sm-12">
                        <div class="form-group">
      				        <?php echo $this->Form->input('titulo', array('class' => 'form-control required', 'label' => 'Pergunta')); ?>
      				    </div>
      				</div>
                </div>
                <div class="row no-gutter">
                    <div class="col-sm-6">
                        <?php if(!empty($this->request->data['Alternativa'])):?>
                            <div id = "divAlternativas">
                                <div>
                                    <label for="alternativas">Alternativas: </label>
                                </div>
                				<input type="hidden" id="cont_id_al" value="<?php echo count($this->data['Alternativa']);?>" />
                				<?php foreach($this->data['Alternativa'] as $key => $value):?>
                					<p id="al_<?php echo $key?>">
                						<?php
                							echo $this->Form->hidden("Alternativa.$key.id");
                						?>
                                      <a href="#" onclick="removeAlternativaBD('al_<?php echo $key;?>','<?php echo base64_encode($this->data['Alternativa'][$key]['id']);?>'); return false;" class="remover"></a>
                						<textarea name="data[Alternativa][<?php echo $key;?>][nome]" class = "form-control required"><?php echo $value['nome'];?></textarea>
                					</p>
                				<?php endforeach;?>
                                <?php echo $this->Html->link("Adicionar Alternativas","#",array("onclick"=>"addFormAlternativas(); return false;","class"=>"add"),null,null,false);?>
                            </div>
                        <?php endif;?>
                        <?php if(!empty($this->data['Opcao'])): ?>
                            <div id="divOpcoes">
                                <div>
                                    <label for="opcoes">Opções: </label>
                                </div>
                				<input type="hidden" id="cont_id_op" value="<?php echo count($this->data['Opcao']);?>">
                				<?php foreach($this->request->data['Opcao'] as $key => $value):?>
                					<p id="op_<?php echo $key?>">
                						<?php
                							echo $this->Form->hidden("Opcao.$key.id");
                						?>
                                        <a href="#" onclick="removeOpcaoBD('op_<?php echo $key;?>','<?php echo base64_encode($this->data['Opcao'][$key]['id']);?>'); return false;" class="remover"></a>
                						<textarea name="data[Opcao][<?php echo $key;?>][nome]" class = "form-control required"><?php echo $value['nome'];?></textarea>
                					</p>
                				<?php endforeach;?>
                                <?php echo $this->Html->link('Adicionar Opções','#',array('onclick'=>'addFormOpcoes(); return false;'),null,null,false);?>
                			</div>
                        <?php endif;?>
      				</div>
                </div>
                <button class="btn btn-primary" type="submit">Salvar</button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>