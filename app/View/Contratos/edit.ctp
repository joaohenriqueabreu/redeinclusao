<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('scripts-modal', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
        var dates = $( "#ContratoInicioVigencia, #ContratoTerminoVigencia" ).datepicker({
    		changeMonth: true,
    		changeYear: true,
    		dateFormat: 'dd/mm/yy',
    		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    		onSelect: function( selectedDate ) {
    			var option = this.id == "ContratoInicioVigencia" ? "minDate" : "maxDate",
    			instance = $( this ).data( "datepicker" ),
    			date = $.datepicker.parseDate(
    				instance.settings.dateFormat ||
    				$.datepicker._defaults.dateFormat,
    				selectedDate, instance.settings );
    			dates.not( this ).datepicker( "option", option, date );
    		}
    	});

    	$('#ContratoEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/Contratos/salva",
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Cadastrado salvo com sucesso.", function(){ location.reload(); });
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!", function(){ location.reload(); });
                	}
                }
           });
           return false;
    	});
    });
<?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Form->create('Contrato', array('role' => 'form', 'type'=>'file')); ?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Editar Contrato</h4>
 </div>
 <div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
        <?php echo $this->Form->input('id', array('type'=>'hidden'));?>
        <?php echo $this->Form->input('cliente_id', array('type'=>'hidden'));?>
        <?php echo $this->Form->input('status_atual', array('type'=>'hidden', 'value' => $this->Form->value('Contrato.status')));?>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('data', array('onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'required'=>'required', 'class'=>'form-control datepicker'));?>
            </div>
        </div>
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('inicio_vigencia', array('type'=>'text', 'label'=>'Início de Vigência', 'class'=>'form-control',  'onkeyup' => 'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'maxlength'=>10));?>
            </div>
        </div>
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('termino_vigencia', array('type'=>'text', 'label'=>'Término de Vigência', 'class'=>'form-control', 'onkeyup' => 'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'maxlength'=>10));?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <?php echo $this->Form->input('descricao', array('label'=>'Descrição', 'class'=>'form-control')); ?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <?php echo $this->Form->input('observacoes', array('label'=>'Observações', 'class'=>'form-control')); ?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('investimento', array('class'=>'form-control', 'onkeyup' => "formataValor(this,event)", 'onkeypress'=>'return OnlyNumbers(event)')); ?>
            </div>
        </div>
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('numero_cota', array('label' => 'Nº Cota', 'class'=>'form-control', 'onkeypress'=>'return OnlyNumbers(event)')); ?>
            </div>
        </div>
        <div class="col-lg-4 col-sm-2 col-sx-2">
            <div class="form-group">
                <?php echo $this->Form->input('status', array('label'=>'Status', 'class'=>'form-control', 'empty' => 'Selecione', 'options' => $this->Util->statusContrato())); ?>
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
    <div class="row no-gutter">
        <div class="col-lg-12 col-sm-6 col-sx-6">
            <div class="form-group">
                <?php
                    if(!empty($this->request->data['Contrato']['anexo'])):
                        echo $this->Form->input('nome_arquivo', array('type' => 'hidden', 'value'=>$this->Form->value('Contrato.anexo')));
                        echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/contrato/anexo/'.$this->Form->value('Contrato.dir').'/'.$this->Form->value('Contrato.anexo'), array('target'=>'_blank', 'escape' => false));
                ?>
                        <div class="checkbox">
                            <label>
                                <input name="data[Contrato][remover_arquivo]" type="checkbox" value="1">Remover Arquivo
                            </label>
                        </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>
