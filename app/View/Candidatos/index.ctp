<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pesquisar</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $listPretensoes = array();
                        foreach ($pretensoesSalariais as $pretensao) {
                            if ($pretensao['PretensoesSalarial']['final'] == 99) {
                                $texto = 'acima de R$3.000,00';
                            } else {
                                $texto = $this->Formatacao->moeda($pretensao['PretensoesSalarial']['inicial']) . ' - ' . $this->Formatacao->moeda($pretensao['PretensoesSalarial']['final']);
                            }
                            $listPretensoes[$pretensao['PretensoesSalarial']['id']] = $texto;
                        }
                        ksort($listPretensoes);
                        $listCidades = array();
                        foreach ($cidadesGroup as $cidade) {
                            $listCidades[$cidade['Candidato']['cidade']] = $cidade['Candidato']['cidade'];
                        }
                        ksort($listCidades);
                        echo $this->Form->create('PesquisaCandidato', array('role' => 'form', 'type' => 'get'));
                        ?>
                        <div class="row">
                            <?php
                            echo $this->Form->input('escolaridade_id', array('class' => 'form-control', 'div' => array('class' => 'col-xs-3'), 'options' => $escolaridades, 'empty' => 'Selecione', 'value' => (isset($_GET['escolaridade_id']) ? $_GET['escolaridade_id'] : '')));
                            echo $this->Form->input('pretensao_salarial_id', array('class' => 'form-control', 'div' => array('class' => 'col-xs-3'), 'options' => $listPretensoes, 'label' => 'Pretenção Salarial', 'empty' => 'Selecione', 'value' => (isset($_GET['pretensao_salarial_id']) ? $_GET['pretensao_salarial_id'] : '')));
                            echo $this->Form->input('sexo', array('class' => 'form-control', 'div' => array('class' => 'col-xs-3'), 'options' => $sexo, 'label' => 'Sexo', 'empty' => 'Selecione', 'value' => (isset($_GET['sexo']) ? $_GET['sexo'] : '')));
                            echo $this->Form->input('cidade', array('class' => 'form-control', 'div' => array('class' => 'col-xs-3'), 'options' => $listCidades, 'label' => 'Cidade', 'empty' => 'Selecione', 'value' => (isset($_GET['cidade']) ? $_GET['cidade'] : '')));
                            ?>
                        </div>
                        <p style="clear: both"></p>
                        <div class="row">
                            <div class="form-group">
                                <?=
                                $this->Form->input('tipo_emprego', [
                                    'label' => 'Tipo de trabalho',
                                    'class' => 'form-control',
                                    'div' => ['class' => 'col-xs-3'],
                                    'options' => ['A' => 'Aprendiz',
                                        'P' => 'Emprego apoiado', 'T' => 'Tradicional'],
                                    'empty' => true,
                                    'value' => (isset($_GET['tipo_emprego'])) ? $_GET['tipo_emprego'] : ''
                                ])
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Período de Cadastrado</label>
                                <div class="form-inline">
                                    <input type="text" id="CandidatoInicio" class="form-control datepicker" maxlength="10" onkeypress="return OnlyNumbers(event)" onkeyup="formataData(this, event)" name="inicio" placeholder="Início" value=<?= isset($_GET['inicio']) ? $_GET['inicio'] : '' ?> >
                                    <input type="text" id="CandidatoTermino" class="form-control datepicker" maxlength="10" onkeypress="return OnlyNumbers(event)" onkeyup="formataData(this, event)" name="termino" placeholder="Término" value=<?= isset($_GET['termino']) ? $_GET['termino'] : '' ?>>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <?php
                                $auditiva = '';
                                if (isset($_GET['possui_deficiencia_auditiva'])) {
                                    $auditiva = 'checked="checked"';
                                }
                                $fisica = '';
                                if (isset($_GET['possui_deficiencia_fisica'])) {
                                    $fisica = 'checked="checked"';
                                }
                                $intelectual = '';
                                if (isset($_GET['possui_deficiencia_intelectual'])) {
                                    $intelectual = 'checked="checked"';
                                }
                                $visual = '';
                                if (isset($_GET['possui_deficiencia_visual'])) {
                                    $visual = 'checked="checked"';
                                }
                                $cota = '';
                                if (isset($_GET['condicao_comprimento_cota'])) {
                                    $cota = 'checked="checked"';
                                }
                                ?>
                                <div class="form-group">
                                    <label>Tipo de Deficiência</label>
                                    <p style="clear: both"></p>
                                    <label class="checkbox-inline" for="CandidatoPossuiDeficienciaAuditiva">
                                        <input type="checkbox" id="CandidatoPossuiDeficienciaAuditiva" value="1" name="possui_deficiencia_auditiva" <?= $auditiva ?>>Auditiva
                                    </label>
                                    <label class="checkbox-inline" for="CandidatoPossuiDeficienciaFisica">
                                        <input type="checkbox" id="CandidatoPossuiDeficienciaFisica" value="1" name="possui_deficiencia_fisica" <?= $fisica ?>>Fisíca
                                    </label>
                                    <label class="checkbox-inline" for="CandidatoPossuiDeficienciaIntelectual">
                                        <input type="checkbox" id="CandidatoPossuiDeficienciaIntelectual" value="1" name="possui_deficiencia_intelectual" <?= $intelectual ?>>Intelectual
                                    </label>
                                    <label class="checkbox-inline" for="CandidatoPossuiDeficienciaVisual">
                                        <input type="checkbox" id="CandidatoPossuiDeficienciaVisual" value="1" name="possui_deficiencia_visual" <?= $visual ?>>Visual
                                    </label>
                                    <label class="checkbox-inline" for="CandidatoCondicaoComprimentoCota">
                                        <input type="checkbox" id="CandidatoCondicaoComprimentoCota" value="1" name="condicao_comprimento_cota" <?= $cota ?>>Reabilitado
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                        <a href="<?= $this->base ?>/candidatos" class="btn btn-primary">Todos</a>
                        <?php
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li><a href="<?= $this->base ?>/candidatos/add"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a></li>
                    <li><a href="<?= $this->base ?>/candidatos/graficos"><i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;&nbsp;Gráfico de Cadastro</a></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php
                    echo $this->DataTable->render('Candidato', array(), array('sAjaxSource' => array(
                            'action' => 'processDataTableRequest'), 'conditions' => $this->params->query))
                    ?>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>