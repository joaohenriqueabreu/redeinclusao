<?php
if (isset($_GET['ano'])) {
    $ano = $_GET['ano'];
} else {
    $ano = date('Y');
}

$dados = '';
foreach ($counts as $count) {
    $cadastros = $count[0]['cadastros'];
    $periodo = $count[0]['periodo'];
    $auditiva = $count[0]['possui_deficiencia_auditiva'];
    $fisica = $count[0]['possui_deficiencia_fisica'];
    $intelectual = $count[0]['possui_deficiencia_intelectual'];
    $visual = $count[0]['possui_deficiencia_visual'];
    $multipla = $count[0]['possui_deficiencia_multipla'];
    $pessoasReabilitadas = (empty($count[0]['condicao_comprimento_cota']) ? 0 : $count[0]['condicao_comprimento_cota']);
    $dados .="{periodo: '$periodo',cadastros: $cadastros,  reabilitadas: $pessoasReabilitadas, auditiva: $auditiva, fisica: $fisica, intelectual: $intelectual, visual: $visual, multipla: $multipla},";
}
/*
  echo $this->Html->css('charts/morris');
  echo $this->Html->script('charts/raphael', array('block'=>'customArchives'));
  echo $this->Html->script('charts/morris', array('block'=>'customArchives'));
  echo $this->Html->script('charts/excanvas.min', array('block'=>'customArchives'));
  echo $this->Html->script('charts/jquery.flot', array('block'=>'customArchives'));
  echo $this->Html->script('charts/jquery.flot.pie', array('block'=>'customArchives'));
  echo $this->Html->script('charts/jquery.flot.tooltip.min', array('block'=>'customArchives'));
 */

echo $this->Html->script('calendar/moment.min', array('block' => 'customArchives'));
echo $this->Html->script('calendar/fullcalendar.min', array('block' => 'customArchives'));
echo $this->Html->script('calendar/custom', array('block' => 'customArchives'));
echo $this->Html->css('fullcalendar');


//print_r($counts);
//exit;

echo $this->Html->scriptStart(array('block' => 'codesJavaScripts'));
?>
<!-- Morris Charts JavaScript -->
/* $(function() {
Morris.Bar({
element: 'morris-area-chart',
data: [<?= $dados ?>],
xkey: 'periodo',
ykeys: ['cadastros', 'reabilitadas', 'auditiva', 'fisica', 'intelectual', 'visual', 'multipla'],
labels: ['Total de Cadastros', 'Pessoas reabilitadas', 'Pessoas com deficiência auditiva', 'Pessoas com deficiência fisíca', 'Pessoas com deficiência intelectual', 'Pessoas com deficiência visual', 'Pessoas com deficiência múltipla'],
pointSize: 2,
hideHover: 'auto',
resize: true
});
});

//Flot Pie Chart
$(function() {

var data = [{
label: " Reabilitadas - <?= $somatoriosCadastrado[0][0]['condicao_comprimento_cota'] ?>",
data: <?= $somatoriosCadastrado[0][0]['condicao_comprimento_cota'] ?>
}, {
label: " Auditiva - <?= $somatoriosCadastrado[0][0]['possui_deficiencia_auditiva'] ?>",
data: <?= $somatoriosCadastrado[0][0]['possui_deficiencia_auditiva'] ?>
}, {
label: " Fisíca - <?= $somatoriosCadastrado[0][0]['possui_deficiencia_fisica'] ?>",
data: <?= $somatoriosCadastrado[0][0]['possui_deficiencia_fisica'] ?>
}, {
label: " Intelectual - <?= $somatoriosCadastrado[0][0]['possui_deficiencia_intelectual'] ?>",
data: <?= $somatoriosCadastrado[0][0]['possui_deficiencia_intelectual'] ?>
}, {
label: " Visual - <?= $somatoriosCadastrado[0][0]['possui_deficiencia_visual'] ?>",
data: <?= $somatoriosCadastrado[0][0]['possui_deficiencia_visual'] ?>
}, {
label: " Múltipla - <?= $somatoriosCadastrado[0][0]['possui_deficiencia_multipla'] ?>",
data: <?= $somatoriosCadastrado[0][0]['possui_deficiencia_multipla'] ?>
}];

var plotObj = $.plot($("#flot-pie-chart-cadastradas"), data, {
series: {
pie: {
show: true
}
},
grid: {
hoverable: true
},
tooltip: true,
tooltipOpts: {
content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
shifts: {
x: 20,
y: 0
},
defaultTheme: false
}
});

});

//Flot Pie Chart
$(function() {

var data = [{
label: " Reabilitadas - <?= $somatoriosProcessoSeletivo[0][0]['condicao_comprimento_cota'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['condicao_comprimento_cota'] ?>
}, {
label: " Auditiva - <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_auditiva'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_auditiva'] ?>
}, {
label: " Fisíca - <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_fisica'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_fisica'] ?>
}, {
label: " Intelectual - <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_intelectual'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_intelectual'] ?>
}, {
label: " Visual - <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_visual'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_visual'] ?>
}, {
label: " Múltipla - <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_multipla'] ?>",
data: <?= $somatoriosProcessoSeletivo[0][0]['possui_deficiencia_multipla'] ?>
}];

var plotObj = $.plot($("#flot-pie-chart-contratadas"), data, {
series: {
pie: {
show: true
}
},
grid: {
hoverable: true
},
tooltip: true,
tooltipOpts: {
content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
shifts: {
x: 20,
y: 0
},
defaultTheme: false
}
});

}); */
<?php
echo $this->Html->scriptEnd();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-briefcase fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $this->Util->countClientes('E', 'E', 'S') ?></div>
                        <div>Empresas Efetivadas</div>
                    </div>
                </div>
            </div>
            <a href="<?= $this->base ?>/clientes/index?status=E&tipo=E&ativo=S">
                <div class="panel-footer">
                    <span class="pull-left">Mais detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-university fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $this->Util->countClientes('E', 'S') ?></div>
                        <div>Escolas Efetivadas</div>
                    </div>
                </div>
            </div>
            <a href="<?= $this->base ?>/clientes/index?status=E&tipo=S">
                <div class="panel-footer">
                    <span class="pull-left">Mais detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $this->Util->countCandidatos() ?></div>
                        <div>Candidatos</div>
                    </div>
                </div>
            </div>
            <a href="<?= $this->base ?>/candidatos">
                <div class="panel-footer">
                    <span class="pull-left">Mais detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-inbox fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $this->Util->countVagas('A') ?></div>
                        <div>Vagas Ativas</div>
                    </div>
                </div>
            </div>
            <a href="<?= $this->base ?>/vagas?status=A">
                <div class="panel-footer">
                    <span class="pull-left">Mais detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                if (isset($_GET['user']) && $_GET['user'] != 0):
                    ?>
                    <h4>Agenda - <?= $this->Util->mostraNomeUsuario($_GET['user']) ?></h4>
                    <?php
                else:
                    ?>
                    <h4>Agenda da Equipe</h4>
                <?php
                endif;
                ?>
                <div class="btn-group pull-right">
                    <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle" type="button">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu slidedown">
                        <li>
                            <a href="<?= $this->base ?>/Pages?user=0">
                                Todos
                            </a>
                        </li>
                        <?php
                        foreach ($usuarios as $key => $value):
                            ?>
                            <li>
                                <a href="<?= $this->base ?>/Pages?user=<?= $key ?>">
                                    <?= $value ?>
                                </a>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <input type="hidden" value="<?= isset($_GET['user']) ? $_GET['user'] : '0' ?>" id="usuario">
                <input type="hidden" value="1" id="origem">
                <div id='calendar'></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- Modal HTML -->
<div id="myLargeModalLabel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>
<!-- Modal HTML -->
<div id="subModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>