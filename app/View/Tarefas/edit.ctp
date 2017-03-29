<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
        var dates = $( "#TarefaInicio, #TarefaTermino" ).datepicker({
    		changeMonth: true,
    		changeYear: true,
    		dateFormat: 'dd/mm/yy',
    		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    		onSelect: function( selectedDate ) {
    			var option = this.id == "TarefaInicio" ? "minDate" : "maxDate",
    			instance = $( this ).data( "datepicker" ),
    			date = $.datepicker.parseDate(
    				instance.settings.dateFormat ||
    				$.datepicker._defaults.dateFormat,
    				selectedDate, instance.settings );
    			dates.not( this ).datepicker( "option", option, date );
    		}
    	});
    	$('#TarefaEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/Tarefas/salva",
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
                            location.reload();
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
  <?php echo $this->Form->create('Tarefa', array('role' => 'form', 'type'=>'file')); ?>
   <div class="modal-header">
       <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
       <h4 class="modal-title">Editar Ação</h4>
   </div>
   <div class="modal-body">
      <h4> Ata: <?=$this->request->data['Ata']['titulo']?> </h4>
      <div class="form-group">
          <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
          <?php echo $this->Form->input('id');?>
          <?php echo $this->Form->input('cliente_id', array('type' => 'hidden'));?>
          <?php echo $this->Form->input('user_id', array('type' => 'hidden'));?>
          <?php echo $this->Form->input('resposta_levantamento_id', array('type' => 'hidden'));?>
          <?php echo $this->Form->input('status_atual', array('type' => 'hidden', 'value' => $this->Form->value('Tarefa.status')));?>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-6 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('tarefa', array('label' => 'Ação', 'class' => 'form-control'));?>
              </div>
          </div>
          <div class="col-lg-6 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('por_que_fazer', array('label' => 'Por que fazer?', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-6 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('onde_faremos', array('label' => 'Onde faremos?', 'class' => 'form-control'));?>
              </div>
          </div>
          <div class="col-lg-6 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('quem_fara', array('label' => 'Responsável no Cliente?', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('inicio', array('onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'label'=>'Previsão de Início', 'class' => 'form-control'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('termino', array('onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'label'=>'Previsão de Término', 'class' => 'form-control'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-1 col-sx-1">
              <div class="form-group">
                  <?php echo $this->Form->input('quanto_vai_custar', array('type'=>'text', 'label'=>'Quanto vai custar?', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-4 col-sm-3 col-sx-3">
              <div class="form-group">
                  <?php echo $this->Form->input('tempo_planejado', array('label'=>'Tempo Planejado (Em Minutos)', 'class' => 'form-control', 'onkeypress'=>'return OnlyNumbers(event)'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-3 col-sx-3">
              <div class="form-group">
                  <?php echo $this->Form->input('colaborador_id', array('empty'=>'Selecione', 'class' => 'form-control'));?>
              </div>
          </div>
          <div class="col-lg-4 col-sm-3 col-sx-3">
              <div class="form-group">
                  <?php echo $this->Form->input('status', array('empty'=>'Selecione', 'class' => 'form-control', 'options' => $this->Util->statusAtividades()));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-12 col-sm-6 col-sx-6">
              <div class="form-group">
                  <?php echo $this->Form->input('como_fazer', array('label' => 'Como fazer?', 'class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-12 col-sm-6 col-sx-6">
              <div class="form-group">
                  <?php echo $this->Form->input('parecer', array('class' => 'form-control'));?>
              </div>
          </div>
      </div>
      <div class="row no-gutter">
          <div class="col-lg-12 col-sm-6 col-sx-6">
              <div class="form-group">
            	    <?php echo $this->Form->input('anexo', array('type'=>'file', 'class' => 'filestyle', 'data-buttonText'=>'Selecionar Arquivo'));?>
              </div>
          </div>
      </div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
     <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
   </div>
   <?php echo $this->Form->end() ?>