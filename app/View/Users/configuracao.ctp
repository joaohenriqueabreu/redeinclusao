<?php
    echo $this->Html->script('jquery.validate.min', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
      jQuery.extend(jQuery.validator.messages, {
          required: ""
      });

      $("#UserConfiguracaoForm").validate({
        debug:true,
  		rules:{
  			"data[User][email]": {
  				remote: {
  					url: '<?php echo $this->base;?>/users/verifica_email/<?=$this->data['User']['id']?>',
  					type: 'post',
                       beforeSend: function(data){
                          $('#loading_block').show();
                       },
                       complete: function(data){
                          $('#loading_block').hide();
                       }
  				}
  			},
  		},
          messages:{
  			'data[User][email]':{
  				remote: jQuery.format("Este e-mail já está cadastrado")
  			},
  		},
          submitHandler: function(form){
              form.submit();
    		}
      });
  });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Configuração</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('User', array('role'=>'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Atualizar</h4>
                <ul class="links">
                    <li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
        					<?php echo $this->Form->input('id');?>
        					<?php echo $this->Form->input('nome', array('label'=>'Nome', 'required'=>'required', 'class' => 'form-control', 'disabled' => true));?>
      				    </div>
                    </div>
                   <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('email', array('label'=>'E-mail', 'type'=>'email', 'required'=>'required', 'class' => 'form-control')); ?>
        				</div>
                  </div>
               </div>
               <div class="row no-gutter">
                  <div class="col-lg-3 col-sm-3 col-sx-3">
                      <div class="form-group">
        					<?php echo $this->Form->input('username', array('label'=>'Usuário', 'required'=>'required', 'class' => 'form-control', 'disabled' => true)); ?>
        				</div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-sx-3">
                      <div class="form-group">
        					<?php echo $this->Form->input('new_password', array('type'=>'password', 'autocomplete'=>false, 'label'=>'Senha', 'class' => 'form-control')); ?>
        				</div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Salvar</button>
    <?php echo $this->Form->end(); ?>
</div>