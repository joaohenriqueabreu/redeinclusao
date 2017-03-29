<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#CandidatosHistoricoEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/CandidatosHistoricos/salva",
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Cadastrado salvo com sucesso.", function(){ location.reload(); });
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
                	}
                }
           });
           return false;
    	});
    });
<?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Form->create('CandidatosHistorico', array('role' => 'form', 'type'=>'file')); ?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Editar Histórico</h4>
 </div>
 <div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->input('id');?>
    	<?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
        <?php echo $this->Form->input('candidato_id', array('type'=>'hidden'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('data', array('onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'required'=>'required', 'class'=>'form-control datepicker'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('descricao', array('label'=>'Descrição', 'class'=>'form-control')); ?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('arquivo', array('type'=>'file', 'class' => 'filestyle', 'data-buttonText'=>'Selecionar Arquivo'));?>
    </div>
    <div class="form-group">
        <?php
            if(!empty($this->request->data['CandidatosHistorico']['arquivo'])):
                echo $this->Form->input('nome_arquivo', array('type' => 'hidden', 'value'=>$this->Form->value('CandidatosHistorico.arquivo')));
                echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/clientes_historicos/arquivo/'.$this->Form->value('CandidatosHistorico.dir').'/'.$this->Form->value('CandidatosHistorico.arquivo'), array('target'=>'_blank', 'escape' => false));
        ?>
                <div class="checkbox">
                    <label>
                        <input name="data[CandidatosHistorico][remover_arquivo]" type="checkbox" value="1">Remover Arquivo
                    </label>
                </div>
        <?php
            endif;
        ?>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>

