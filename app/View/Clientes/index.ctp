<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
            $tipo = '';
            if (isset($this->params->query['status'])) {
                $tipo = $this->Util->tipoCliente($this->params->query['status'][0], 1);
            }
            if (isset($this->params->query['ativo']) and $this->params->query['ativo'] == 'N') {
                $tipo = 'Inativas';
            }
            if ($this->params->query['tipo'] == 'E') {
                echo 'Empresas';
            } elseif ($this->params->query['tipo'] == 'S') {
                echo 'Escolas';
            }
            echo ' - ' . $tipo;
            ?>
        </h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pesquisar</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $listCidades = array();
                        foreach ($cidadesGroup as $cidade) {
                            $listCidades[$cidade['Cliente']['cidade']] = $cidade['Cliente']['cidade'];
                        }
                        ksort($listCidades);
                        echo $this->Form->create('PesquisaEmpresas', array('role' => 'form', 'type' => 'get'));
                        ?>
                        <div class="row">
                            <?php
                            echo $this->Form->input('status', array(
                                'class' => 'form-control', 'div' => array(
                                    'class' => 'col-xs-3'),
                                'options' => ['R' => 'Receptivo', 'E' => 'Efetivado'],
                                'label' => 'Status',
                                'value' => (isset($_GET['pretensao_salarial_id']) ? $_GET['pretensao_salarial_id'] : '')));
                            ?>
                            <?php
                            echo $this->Form->input('ativo', array(
                                'class' => 'form-control', 'div' => array(
                                    'class' => 'col-xs-3'), 'options' => [
                                    'S' => 'Sim', 'N' => 'Não'],
                                'label' => 'Ativo',
                                'value' => (isset($_GET['sexo']) ? $_GET['sexo'] : '')));
                            echo $this->Form->hidden('tipo', [
                                'value' => $_GET['tipo']
                            ]);
                            ?>
                            <?php
                            echo $this->Form->input('cidade', array(
                                'class' => 'form-control', 'div' => array(
                                    'class' => 'col-xs-3'), 'options' => $listCidades,
                                'label' => 'Cidade', 'empty' => 'Selecione',
                                'value' => (isset($_GET['cidade']) ? $_GET['cidade'] : '')));
                            ?>
                        </div>
                        <p style="clear: both"></p>
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Período de Cadastrado</label>
                                <div class="form-inline">
                                    <input type="text" id="CandidatoInicio" 
                                           class="form-control datepicker" maxlength="10" 
                                           onkeypress="return OnlyNumbers(event)" 
                                           onkeyup="formataData(this, event)" name="inicio" 
                                           placeholder="Início" style="width: 45%;"
                                           value=<?= isset($_GET['inicio']) ? $_GET['inicio'] : '' ?> >
                                    <input type="text" id="CandidatoTermino" 
                                           class="form-control datepicker" maxlength="10" 
                                           onkeypress="return OnlyNumbers(event)" 
                                           onkeyup="formataData(this, event)" name="termino" 
                                           placeholder="Término" style="width: 45%;"
                                           value=<?= isset($_GET['termino']) ? $_GET['termino'] : '' ?>>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <?=
                                $this->Form->input('ata', [
                                    'label' => 'Ata', 'class' => 'form-control',
                                    'options' => ['S' => 'Sim', 'N' => 'Não'],
                                    'default' => (isset($this->request->query['ata'])) ? $this->request->query['ata'] : 'N',
                                    'id' => 'selectAta'
                                ])
                                ?>
                            </div>
                            <div class="col-sm-3" id="periodoAta" style="display: none;">
                                <label>Período da Ata</label>
                                <div class="form-inline">
                                    <input type="text" id="AtaInicio" 
                                           class="form-control datepicker" maxlength="10" 
                                           onkeypress="return OnlyNumbers(event)" 
                                           onkeyup="formataData(this, event)" name="inicioAta" 
                                           placeholder="Início" style="width: 45%;"
                                           value=<?= isset($_GET['inicioAta']) ? $_GET['inicioAta'] : '' ?> >
                                    <input type="text" id="AtaTermino" 
                                           class="form-control datepicker" maxlength="10" 
                                           onkeypress="return OnlyNumbers(event)" 
                                           onkeyup="formataData(this, event)" name="terminoAta" 
                                           placeholder="Término" style="width: 45%;"
                                           value=<?= isset($_GET['terminoAta']) ? $_GET['terminoAta'] : '' ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <br>
                                <button class="btn btn-primary" type="submit"
                                        title="Pesquisar">
                                    Pesquisar
                                    <!--<i class="glyphicon glyphicon-search"></i>-->
                                </button>
                                <a href="<?= $this->base ?>/clientes/index?ativo=S&status=R&tipo=E" 
                                   class="btn btn-primary">Todos</a>
                            </div>
                        </div>
                        <!--<p style="clear: both"></p>-->
                        <?php
                        echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <?php
                if (isset($this->params->query['status'])):
//                    $parametros[] = (isset($this->params->query["ativo"])) ? 'ativo=' . $this->params->query["ativo"] : '';
//                    $parametros[] = 'status=' . $this->params->query["status"];
//                    $parametros[] = 'tipo=' . $this->params->query["tipo"];
                    $pesquisa = $this->request->query;
                    foreach ($pesquisa as $key => $value) {
                        $parametros[] = $key . '=' . $value . '&';
                    }
//                    echo implode('&', array_keys($teste)) . implode('=', $teste);
                    ?>
                    <ul class="links">
                        <li>
                            <a href="<?= $this->base ?>/clientes/gerarPdf.pdf?<?= implode('', $parametros) ?>" 
                               title="Exportar para PDF" target="_blank">
                                <i class="fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->base ?>/clientes/gerarExcel.pdf?<?= implode('', $parametros) ?>" 
                               title="Exportar para Excel">
                                <i class="fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->base ?>/clientes/add?<?= implode('', $parametros) ?>" 
                               data-original-title="" title="">
                                <i class="glyphicon glyphicon-plus"></i>
                                &nbsp;&nbsp;Adicionar</a>
                        </li>
                    </ul>
                    <?php
                endif;
                ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php
                    echo $this->DataTable->render('Cliente', array(), array(
                        'sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => $this->params->query))
                    ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>