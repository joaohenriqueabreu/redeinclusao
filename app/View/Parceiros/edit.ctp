<?php
    echo $this->Html->script('cep', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
  $(document).ready(function(){
     <?php
        if($this->request->data['Parceiro']['tipo'] == 'PJ'):
     ?>
          $("#parceiroCNPJ").fadeIn();
          $("#ParceiroCnpj").val('<?=$this->request->data['Parceiro']['cpf_cnpj']?>');
      <?php
        else:
      ?>
          $("#parceiroCPF").fadeIn();
          $("#ParceiroCpf").val('<?=$this->request->data['Parceiro']['cpf_cnpj']?>');
      <?php
        endif;
      ?>
     $("#ParceiroTipo").change(function(){
          $("#ParceiroCnpj").val('');
          $("#ParceiroCpf").val('');
          if($(this).val() == 'PJ'){
            $("#parceiroCNPJ").fadeIn();
            $("#parceiroCPF").fadeOut();
          }else if($(this).val() == 'PF'){
            $("#parceiroCNPJ").fadeOut();
            $("#parceiroCPF").fadeIn();
          }else{
            $("#parceiroCNPJ").fadeOut();
            $("#parceiroCPF").fadeOut();
          }
     });
  });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Parceiros</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Parceiro', array('role'=>'form', 'type' => 'file')); ?>
        <?php echo $this->Form->input('id');?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Atualizar</h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/parceiros/index?ativo=S" data-original-title="" title=""><i class="fa  fa-list "></i>&nbsp;&nbsp;Listar</a></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
               <div class="row no-gutter">
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      				    <?php echo $this->Form->input('tipo', array('class' => 'form-control', 'empty'=>'Selecione', 'options'=>array('PF' => 'Pessoa Fisíca', 'PJ' => 'Pessoa Jurídica'))); ?>
      				</div>
                </div>
                 <div class="col-lg-5 col-sm-5 col-sx-5">
                      <div class="form-group">
      					<?php echo $this->Form->input('nome', array('class' => 'form-control'));?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2" style="display: none" id="parceiroCNPJ">
                    <div class="form-group">
      					<?php echo $this->Form->input('cnpj', array('class' => 'form-control', 'label'=>'CNPJ', 'onkeyup' => "formataCNPJ(this,event)", 'onkeypress'=>'return OnlyNumbers(event)', 'maxlength' => 18)); ?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2" style="display: none"  id="parceiroCPF">
                    <div class="form-group">
      					<?php echo $this->Form->input('cpf', array('class' => 'form-control', 'label'=>'CPF', 'onkeyup' => "formataCPF(this,event)", 'onkeypress'=>'return OnlyNumbers(event)', 'maxlength' => 14)); ?>
     				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      				    <?php echo $this->Form->input('categoria', array('class' => 'form-control', 'empty'=>'Selecione', 'options'=>$this->Util->categoriaParceiro())); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'label'=>'CEP', 'id'=>'cep', 'onkeyup' => "formataCEP(this,event)", 'onkeypress'=>'return OnlyNumbers(event)')); ?>
      				</div>
                </div>
                <div class="col-lg-5 col-sm-5 col-sx-5">
                    <div class="form-group">
      					<?php echo $this->Form->input('logradouro', array('class' => 'form-control', 'label'=>'Logradouro', 'id'=>'logradouro')); ?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      					<?php echo$this->Form->input('numero', array('class' => 'form-control', 'label'=>'Número')); ?>
      				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'label'=>'Complemento')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-5 col-sm-5 col-sx-5">
                    <div class="form-group">
      					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'label'=>'Bairro', 'id'=>'bairro')); ?>
      				</div>
                </div>
                <div class="col-lg-5 col-sm-5 col-sx-5">
                    <div class="form-group">
      					<?php echo $this->Form->input('cidade', array('class' => 'form-control', 'label'=>'Cidade', 'id'=>'cidade')); ?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      					<?php echo $this->Form->input('uf', array('class' => 'form-control', 'label'=>'Estado', 'id'=>'uf')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('telefone_1', array('class' => 'form-control', 'label'=>'Telefone 1', 'onkeyup' => "formataTel(this,event)", 'onkeypress'=>'return OnlyNumbers(event)')); ?>
      				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('telefone_2', array('class' => 'form-control', 'label'=>'Telefone 2', 'onkeyup' => "formataTel(this,event)", 'onkeypress'=>'return OnlyNumbers(event)')); ?>
      				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('e_mail', array('label'=>'E-mail', 'class'=>'email form-control')); ?>
      				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('contato', array('class' => 'form-control', 'label'=>'Contato')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-8 col-sm-8 col-sx-8">
                    <div class="form-group">
      					<?php echo $this->Form->input('indicacao', array('class' => 'form-control', 'label'=>'Indicação')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('curriculo', array('label' => 'Currículo', 'type'=>'file', 'class' => 'filestyle', 'data-buttonText'=>'Selecionar Arquivo'));?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-6 col-sm-6 col-sx-6">
                    <div class="form-group">
      					<?php echo $this->Form->input('formacao_academica', array('class' => 'form-control', 'label'=>'Formação Acadêmica')); ?>
      				</div>
                </div>
                <div class="col-lg-6 col-sm-6 col-sx-6">
                    <div class="form-group">
      					<?php echo $this->Form->input('ramo_atuacao', array('class' => 'form-control', 'label'=>'Ramo de Atuação')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-12 col-sm-12 col-sx-12">
                    <div class="form-group">
      				    <?php echo $this->Form->input('historico_atuacao', array('class' => 'form-control', 'label'=>'Histórico de Atuação')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-12 col-sm-12 col-sx-12">
                    <div class="form-group">
      				    <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'label'=>'Descrição')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      			     <?php echo $this->Form->input('ativo', array('class' => 'form-control', 'empty'=>'Selecione', 'options' => $this->Util->statusAtivo())); ?>
      			  </div>
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>