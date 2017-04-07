<?php
echo $this->Html->script('cep', array(
    'block' => 'customArchives'
));
echo $this->Html->script('global', array(
    'block' => 'customArchives'
));
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php

            /// Baanko challenge updates
            if(isset($this->params->query["tipo"])){
                if ($this->params->query['tipo'] == 'S') {
                    echo 'Escola';
                } else {
                    echo 'Empresa';
                }
            }

            ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <?php
                    $parametros[] = (isset($this->params->query["ativo"])) ? 'ativo=' . $this->params->query["ativo"] : '';

                    /// Baanko Challenge updates
                    /// $parametros[] = 'status=' . $this->params->query["status"];
                    /// $parametros[] = 'tipo=' . $this->params->query["tipo"];

                    $parametros[] = (isset($this->params->query["status"])) ? 'status=' . $this->params->query["status"] : '';;
                    $parametros[] = (isset($this->params->query["tipo"])) ? 'tipo=' . $this->params->query["tipo"] : '';
                    ?>
                    <li><a href="javascript:history.back(1);"
                           data-original-title="" title=""> <i
                                class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar
                        </a></li>
                    <li><a
                            href="<?= $this->base ?>/clientes/index?<?= implode('&', $parametros) ?>"
                            data-original-title="" title=""> <i class="fa  fa-list "></i>&nbsp;&nbsp;Listar
                        </a></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <!-- Baanko Challenge updates -->
                            <!-- <?php echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => $this->params->query['tipo'])); ?> -->
                            <?php echo $this->Form->input('tipo', array('type' => 'hidden', 'value' => isset($this->params->query['tipo']) ?  $this->params->query['tipo'] : '')); ?>
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

                <!-- Baanko challenge updates -->
                <!-- <?php ///if ($this->request->query['tipo'] == 'S') : ?> -->
                <?php if (isset($this->request->query['tipo']) && $this->request->query['tipo'] == 'S') : ?>
                    <div class="row no-gutter">
                        <div class="col-lg-3 col-sm-3 col-sx-3">
                            <div class="form-group">
                                <?php
                                echo $this->Form->input('turnos_escola_id', array('label' => 'Turno', 'class' => 'form-control',
                                    'options' => $turnos, 'multiple' => true,
                                    'name' => 'data[Cliente][turnos_escola_id]'));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-sx-3">
                            <div class="form-group">
                                <?php
                                echo $this->Form->input('tipo_educacao_id', array('class' => 'form-control', 'label' => 'Níveis educacionais',
                                    'options' => $tiposEducacao, 'multiple' => true,
                                    'name' => 'data[Cliente][tipo_educacao_id]'));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-sx-2">
                            <div class="form-group">
                                <?php echo $this->Form->input('num_professores', array('class' => 'form-control', 'label' => 'Nº de Professores', 'onkeypress' => 'return OnlyNumbers(event)')); ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-sx-2">
                            <div class="form-group">
                                <?php
                                echo $this->Form->input('sala_recursos', array('class' => 'form-control', 'label' => 'Sala de Recursos',
                                    'options' => [TRUE => 'Sim', FALSE => 'Não'], 'empty' => ''));
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-sx-2">
                            <div class="form-group">
                                <?php
                                echo $this->Form->input('tipo_escola', array('class' => 'form-control', 'label' => 'Tipo de escola',
                                    'options' => ['P' => 'Pública', 'R' => 'Particular'], 'empty' => ''));
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row no-gutter">
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('observacoes', array('class' => 'form-control', 'label' => 'Observações')); ?>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <label>Serviços</label><br />
                            <?php
                            /// Baanko Challenge updates
                            /// $servicos = $this->Util->servicos('', $this->request->query['tipo']);
                            if(isset($this->request->query['tipo'])){
                                $servicos = $this->Util->servicos('', $this->request->query['tipo']);
                            } else {
                                $servicos = array();
                            }
                            foreach ($servicos as $key => $servico) :
                                ?>
                                <div class="checkbox-inline">
                                    <label> <input name="data[Servico][]" type="checkbox"
                                                   value="<?= $key ?>"><?= $servico ?>
                                    </label>
                                </div>
                                <?php
                            endforeach
                            ;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-3 col-sm-3 col-sx-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('classe', array('class' => 'form-control', 'empty' => 'Selecione', 'options' => $this->Util->classeCliente())); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-sx-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('status', array('class' => 'form-control', 'empty' => 'Selecione', 'options' => $this->Util->tipoCliente())); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-sx-3">
                        <div class="form-group">
                            <?php echo $this->Form->input('ativo', array('class' => 'form-control', 'empty' => 'Selecione', 'options' => array('S' => 'Sim', 'N' => 'Não'))); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>