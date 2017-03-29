<?php
    echo $this->Html->css('jquery.msgbox');
    echo $this->Html->script('jquery');
    echo $this->Html->script('jquery.msgbox.min');
    echo $this->Html->script('jquery.validate');
?>
<script>

$(document).ready(function(){
	$('#UserEsqueciMinhaSenhaForm').live("submit",function(){
		if($(this).valid()){
			$('#loading_block').show();
			$.post('<?=$this->base?>/users/envia_senha',$(this).serialize(),function(retorno){
				if(retorno == 1){
                    parent.$.msgbox("Nova senha enviada com sucesso!");
                    parent.$.fancybox.close();
                }else if(retorno == 2){
                    parent.$.msgbox("Email não encontrado",{type: "error"});
                    parent.$.fancybox.close();
				}else{
					parent.$.msgbox("Ocorreu algum erro, por favor tente novamente",{type: "error"});
                    parent.$.fancybox.close();
				}
			});
		}
		return false;
	});
});

</script>

<!-- app/View/Users/add.ctp -->
<div class="users">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Esqueci Minha Senha'); ?></legend>
        <?php
            echo $this->Form->input('email', array('label'=>'E-mail'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>