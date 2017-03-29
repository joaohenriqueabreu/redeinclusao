<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Vagas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php
    $clientesVagas = array();
    foreach($vagas as $vaga){
        $clientesVagas[$vaga['Cliente']['razao_social']][] = $vaga;
    }
    foreach($clientesVagas as $cliente=>$vagas):
?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><?=$cliente?></h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                        <?php
                            foreach($vagas as $vaga):
                        ?>
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4><?=$vaga['Vaga']['unidade']?> - <?=$vaga['Vaga']['cargo']?></h4>
                                            <ul class="links">
                                        		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-search"></i> Visualizar'), array('action' => 'view', $vaga['Vaga']['id']), array('escape'=>false, 'style' => 'color:#fff !important')); ?> </li>
                                            </ul>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-4"><b>Salário</b> : R$<?=$vaga['Vaga']['salario']?></div>
                                                    <div class="col-lg-4"><b>Nº Vagas</b> : <?=$vaga['Vaga']['numero_vagas']?></div>
                                                    <div class="col-lg-4"><b>Sexo</b> : <?=$this->Util->sexo($vaga['Vaga']['sexo'])?></div>
                                                </div>
                                            </div>
                                            <p style="clear: both"></p>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-lg-12">
                                                        <?=$vaga['Vaga']['descricao_vaga']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endforeach;
?>