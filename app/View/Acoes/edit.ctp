<?php
    echo $this->Html->script('scripts-modal', array('block'=>'customArchives'));
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#AcaoEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/Acoes/salva",
                beforeSend: function() {
                    // setting a timeout
                    $('#processing-modal').modal('show');
                },
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Cadastrado salvo com sucesso.",
                          function(){
                            $('#processing-modal').modal('hide');
                            $('#subModal').modal('hide');
                          }
                        );
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
                	}
                }
           });
           return false;
    	});
    });
<?php echo $this->Html->scriptEnd(); ?>
  <?php echo $this->Form->create('Acao', array('role' => 'form', 'type'=>'file')); ?>
   <div class="modal-header">
       <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
       <h4 class="modal-title">Editar Tarefa - Ação <?=$this->Form->value('Tarefa.tarefa')?></h4>
   </div>
   <div class="modal-body">
   <h4> Ata: <?=$nome_ata['Ata']['titulo']?> </h4>
      <div class="form-group">
          <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
          <?php echo $this->Form->input('id');?>
          <?php echo $this->Form->input('tarefa_id', array('type' => 'hidden'));?>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-12 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('quando', array('type' =>'text', 'label' => 'Quando?', 'class' => 'form-control datepicker',  'onkeypress'=>'return OnlyNumbers(event)'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('tempo_gasto', array('label' => 'Tempo Gasto (Minutos)', 'class' => 'form-control',  'onkeypress'=>'return OnlyNumbers(event)'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('colaborador_id', array('empty'=>'Selecione', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-8 col-sm-4 col-sx-4">
              <div class="form-group">
            	    <?php echo $this->Form->input('anexo', array('type'=>'file', 'class' => 'filestyle', 'data-buttonText'=>'Selecionar Arquivo'));?>
              </div>              
          </div>
          <div class="col-lg-4 col-sm-3 col-sx-3">
            <div class="form-group">
                <?php echo $this->Form->input('status', array('empty'=>'Selecione', 'class' => 'form-control', 'options' => $this->Util->statusAtividades()));?>
            </div>
        </div>
      </div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
     <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
   </div>
   <?php echo $this->Form->end() ?>