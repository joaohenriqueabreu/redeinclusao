<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('scripts-modal', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#CandidatosDocumentoEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/CandidatosDocumentos/salva",
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
<?php echo $this->Form->create('CandidatosDocumento', array('role' => 'form', 'type'=>'file')); ?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Editar Documento</h4>
 </div>
 <div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
        <?php echo $this->Form->input('id');?>
        <?php echo $this->Form->input('candidato_id', array('type'=>'hidden'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('descricao', array('label'=>'Descrição', 'class'=>'form-control')); ?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('arquivo', array('type'=>'file', 'class' => 'filestyle', 'data-buttonText'=>'Selecionar Arquivo'));?>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>
