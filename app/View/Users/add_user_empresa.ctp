<form id="AddUserForm" role="form" action="<?=$this->base?>/users/usuarioEmpresa" method="post" accept-charset="utf-8">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Usuário</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
        					<?php echo $this->Form->input('nome', array('label'=>'Nome', 'required'=>'required', 'class' => 'form-control'));?>
      				    </div>
                    </div>
                   <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('email', array('label'=>'E-mail', 'type'=>'email', 'required'=>'required', 'class' => 'form-control')); ?>
        				</div>
                  </div>
               </div>
               <div class="row no-gutter">
                  <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('username', array('label'=>'Usuário', 'required'=>'required', 'class' => 'form-control')); ?>
        				</div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('password', array('type'=>'password', 'autocomplete'=>false, 'label'=>'Senha', 'class' => 'form-control')); ?>
        				</div>
                  </div>
              </div>
            </div>
        </div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<!-- <?php //echo $this->Form->create('Cliente', array('role' => 'form')); ?> -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Empresa</h4>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row no-gutter">
							<div class="col-lg-12 col-sm-12 col-sx-12">
								<div class="form-group">
									<?php echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => '')); ?>
									<?php echo $this->Form->input('razao_social', array('class' => 'form-control', 'label' => 'Razão Social')); ?>
								</div>
							</div>
						</div>
						<div class="row no-gutter">
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php echo $this->Form->input('cnpj', array('class' => 'form-control', 'label' => 'CNPJ', 'onkeyup' => "formataCNPJ(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php
									echo $this->Form->input('inscricao_estadual', array(
										'class' => 'form-control',
										'label' => 'Inscrição Estadual'
									));
									;
									?>
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php echo $this->Form->input('inscricao_municipal', array('class' => 'form-control', 'label' => 'Inscrição Municipal')); ?>
								</div>
							</div>
						</div>
						<div class="row no-gutter">
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('cep', array('class' => 'form-control', 'label' => 'CEP', 'id' => 'cep', 'onkeyup' => "formataCEP(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php echo $this->Form->input('logradouro', array('class' => 'form-control', 'label' => 'Logradouro', 'id' => 'logradouro')); ?>
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-sx-2">
								<div class="form-group">
									<?php echo$this->Form->input('numero', array('class' => 'form-control', 'label' => 'Número')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'label' => 'Complemento')); ?>
								</div>
							</div>
						</div>
						<div class="row no-gutter">
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'label' => 'Bairro', 'id' => 'bairro')); ?>
								</div>
							</div>
							<div class="col-lg-4 col-sm-4 col-sx-4">
								<div class="form-group">
									<?php echo $this->Form->input('cidade', array('class' => 'form-control', 'label' => 'Cidade', 'id' => 'cidade')); ?>
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-sx-2">
								<div class="form-group">
									<?php echo $this->Form->input('estado', array('class' => 'form-control', 'label' => 'Estado', 'id' => 'uf')); ?>
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 col-sx-2">
								<div class="form-group">
									<?php echo $this->Form->input('geocode', array('class' => 'form-control', 'label' => 'Geocode')); ?>
								</div>
							</div>
						</div>
						<?php if ($this->request->query('tipo') == 'S') : ?>
							<div class="row no-gutter">
								<div class="col-lg-6 col-sm-6 col-sx-6">
									<div class="form-group">
										<?php echo $this->Form->input('contato', array('class' => 'form-control', 'label' => 'Contato')); ?>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-sx-6">
									<div class="form-group">
										<?php echo $this->Form->input('cargo_id', array('class' => 'form-control', 'label' => 'Cargo',
										'empty' => true)); ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<div class="row no-gutter">
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('telefone', array('class' => 'form-control', 'label' => 'Telefone 1', 'onkeyup' => "formataTel(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('telefone_2', array('class' => 'form-control', 'label' => 'Telefone 2', 'onkeyup' => "formataTel(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('telefone_3', array('class' => 'form-control', 'label' => 'Telefone 3', 'onkeyup' => "formataTel(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('telefone_4', array('class' => 'form-control', 'label' => 'Telefone 4', 'onkeyup' => "formataTel(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
						</div>
						<div class="row no-gutter">
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('fax', array('class' => 'form-control', 'label' => 'FAX', 'onkeyup' => "formataTel(this,event)", 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('e_mail', array('label' => 'E-mail 1', 'class' => 'email form-control')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('e_mail_2', array('label' => 'E-mail 2', 'class' => 'email form-control')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('e_mail_3', array('label' => 'E-mail 3', 'class' => 'email form-control')); ?>
								</div>
							</div>
						</div>
						<div class="row no-gutter">
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('e_mail_4', array('label' => 'E-mail 4', 'class' => 'email form-control')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('site', array('class' => 'form-control', 'label' => 'Site')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('num_pessoas_deficiencia', array('class' => 'form-control', 'label' => 'Nº de Pessoas com Deficiência', 'onkeypress' => 'return OnlyNumbers(event)')); ?>
								</div>
							</div>
							<div class="col-lg-3 col-sm-3 col-sx-3">
								<div class="form-group">
									<?php echo $this->Form->input('indicado_por', array('class' => 'form-control', 'label' => 'Indicação')); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <?php //echo $this->Form->end(); ?> -->
			</div>
		</div>
	</div>
    <button class="btn btn-primary" type="submit">Salvar</button>
</div>
<?php echo $this->Form->end(); ?>