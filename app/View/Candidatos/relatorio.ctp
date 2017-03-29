    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <i class="fa fa-bar-chart-o fa-fw"></i>
                   Cadastrados por Mês
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="morris-area-chart"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <i class="fa fa-bar-chart-o fa-fw"></i>
                   Cadastrados por deficiência - <b>Total de <?=$somatoriosCadastrado[0][0]['cadastros']?></b>
               </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-pie-chart-cadastradas"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <i class="fa fa-bar-chart-o fa-fw"></i>
                   Contratadas  por deficiência - <b>Total de <?=$somatoriosProcessoSeletivo[0][0]['cadastros']?></b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-pie-chart-contratadas"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i> Índices Anual
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <a class="list-group-item" href="#">
                            <i class="fa fa-group fa-fw"></i> Candidatos Cadastrados
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countCandidatos($ano)?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-briefcase fa-fw"></i> Candidatos Contratados
                            <span class="pull-right text-muted small"><em><b><?=$somatoriosProcessoSeletivo[0][0]['cadastros']?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="<?=$this->base?>/Vagas/index?status=A">
                            <i class="fa fa-inbox fa-fw"></i> Vagas Abertas
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countVagas('A', $ano)?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-inbox fa-fw"></i> Vagas Preenchidas Parcialmente
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->vagasParcial($ano); ?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-desktop fa-fw"></i> Atendimentos Clientes
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countAtasCliente($ano); ?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="#">
                            <i class="fa fa-desktop fa-fw"></i> Atendimentos Candidatos
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countAtasCandidatos($ano); ?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="<?=$this->base?>/Contratos/index?status=A">
                            <i class="fa fa-file-text-o fa-fw"></i> Contratos Ativos
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countContratos('A', $ano); ?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="<?=$this->base?>/Contratos/index?status=F&ano=<?=$ano?>">
                            <i class="fa fa-file-text-o fa-fw"></i> Contratos Finalizados
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countContratos('F', $ano); ?></b></em>
                            </span>
                        </a>
                        <a class="list-group-item" href="<?=$this->base?>/Contratos/index?status=C&ano=<?=$ano?>">
                            <i class="fa fa-file-text-o fa-fw"></i> Contratos Cancelados
                            <span class="pull-right text-muted small"><em><b><?=$this->Util->countContratos('C', $ano); ?></b></em>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->