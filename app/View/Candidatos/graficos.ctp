    <?php
        if(isset($_GET['ano'])){
          $ano = $_GET['ano'];
        }else{
          $ano = date('Y');
        }

        $dados = '';
        foreach($counts as $count){
            $cadastros = $count[0]['cadastros'];
            $periodo = $count[0]['periodo'];
            $auditiva = $count[0]['possui_deficiencia_auditiva'];
            $fisica = $count[0]['possui_deficiencia_fisica'];
            $intelectual = $count[0]['possui_deficiencia_intelectual'];
            $visual = $count[0]['possui_deficiencia_visual'];
            $multipla = $count[0]['possui_deficiencia_multipla'];
            $pessoasReabilitadas = (empty($count[0]['condicao_comprimento_cota'])?0:$count[0]['condicao_comprimento_cota']);
            $dados .="{periodo: '$periodo',cadastros: $cadastros,  reabilitadas: $pessoasReabilitadas, auditiva: $auditiva, fisica: $fisica, intelectual: $intelectual, visual: $visual, multipla: $multipla},";
        }

        echo $this->Html->css('charts/morris');
        echo $this->Html->script('charts/raphael', array('block'=>'customArchives'));
        echo $this->Html->script('charts/morris', array('block'=>'customArchives'));
        echo $this->Html->script('charts/excanvas.min', array('block'=>'customArchives'));
        echo $this->Html->script('charts/jquery.flot', array('block'=>'customArchives'));
        echo $this->Html->script('charts/jquery.flot.pie', array('block'=>'customArchives'));
        echo $this->Html->script('charts/jquery.flot.tooltip.min', array('block'=>'customArchives'));

        echo $this->Html->scriptStart(array('block'=>'codesJavaScripts'));
    ?>
        <!-- Morris Charts JavaScript -->
        $(function() {
            Morris.Bar({
                element: 'morris-area-chart',
                data: [<?=$dados?>],
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
                label: " Reabilitadas - <?=$somatoriosCadastrado[0][0]['condicao_comprimento_cota']?>",
                data: <?=$somatoriosCadastrado[0][0]['condicao_comprimento_cota']?>
            }, {
                label: " Auditiva - <?=$somatoriosCadastrado[0][0]['possui_deficiencia_auditiva']?>",
                data: <?=$somatoriosCadastrado[0][0]['possui_deficiencia_auditiva']?>
            }, {
                label: " Fisíca - <?=$somatoriosCadastrado[0][0]['possui_deficiencia_fisica']?>",
                data: <?=$somatoriosCadastrado[0][0]['possui_deficiencia_fisica']?>
            }, {
                label: " Intelectual - <?=$somatoriosCadastrado[0][0]['possui_deficiencia_intelectual']?>",
                data: <?=$somatoriosCadastrado[0][0]['possui_deficiencia_intelectual']?>
            }, {
                label: " Visual - <?=$somatoriosCadastrado[0][0]['possui_deficiencia_visual']?>",
                data: <?=$somatoriosCadastrado[0][0]['possui_deficiencia_visual']?>
            }, {
                label: " Múltipla - <?=$somatoriosCadastrado[0][0]['possui_deficiencia_multipla']?>",
                data: <?=$somatoriosCadastrado[0][0]['possui_deficiencia_multipla']?>
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
                label: " Reabilitadas - <?=$somatoriosProcessoSeletivo[0][0]['condicao_comprimento_cota']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['condicao_comprimento_cota']?>
            }, {
                label: " Auditiva - <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_auditiva']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_auditiva']?>
            }, {
                label: " Fisíca - <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_fisica']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_fisica']?>
            }, {
                label: " Intelectual - <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_intelectual']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_intelectual']?>
            }, {
                label: " Visual - <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_visual']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_visual']?>
            }, {
                label: " Múltipla - <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_multipla']?>",
                data: <?=$somatoriosProcessoSeletivo[0][0]['possui_deficiencia_multipla']?>
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

        });
    <?php
       echo $this->Html->scriptEnd();
    ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gráficos Candidatos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
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
    <div class="col-lg-6">
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
    <div class="col-lg-6">  
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
</div>
<!-- /.row -->