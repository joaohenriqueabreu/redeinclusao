<?php
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#ClientesContatoAddForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/ClientesContatos/salva",
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
<?php echo $this->Form->create('ClientesContato', array('role' => 'form', 'type'=>'file')); ?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Adicionar contato</h4>
 </div>
 <div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'add'));?>
        <?php echo $this->Form->input('cliente_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('nome', array('class'=>'form-control'));?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('cargo_id', array('class'=>'form-control', 'empty'=>'Selecione')); ?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('telefone', array('class'=>'form-control', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('celular', array('class'=>'form-control', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>'E-mail'));?>
    </div>
    <div class="form-group">
    	<?php echo $this->Form->input('observacoes', array('class'=>'form-control', 'label'=>'Observações'));?>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>
