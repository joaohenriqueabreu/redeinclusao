<?php
echo $this->Html->script('jquery.mask.min', array('block' => 'customArchives'));
?>
<?php $this->Html->scriptStart(array('block' => 'codesJavaScripts')); ?>
$(function() {
$('.moeda').mask('000.000.000.000.000', {reverse: true});
});
<?php $this->Html->scriptEnd(); ?>
<style>
    input, button, select, textarea {
        font-family: inherit;
        font-size: 85% !important;
        font-weight: bold;
        line-height: inherit;
    }
</style>
<div class="indicadoresAnos index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Painel de Indicadores'); ?> - Ano de <?php echo h($indicadoresAno['IndicadoresAno']['ano']); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Visualizar</h4>
                    <ul class="links">
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-refresh"></span>&nbsp&nbsp;Indicadores'), array('action' => 'atualiza_indicadores', $indicadoresAno['IndicadoresAno']['id']), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar'), array('action' => 'edit', $indicadoresAno['IndicadoresAno']['id']), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $indicadoresAno['IndicadoresAno']['id']), array('escape' => false), __('Deseja remover o painel de indicadores de %s?', $indicadoresAno['IndicadoresAno']['ano'])); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?> </li>
                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?> </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Metas</label>
                            <p><?php echo h($indicadoresAno['IndicadoresAno']['metas']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Conclusões</label>
                            <p><?php echo h($indicadoresAno['IndicadoresAno']['conclusoes']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Cadastrado por</label>
                            <p><?php echo h($indicadoresAno['User']['nome']); ?></p>
                        </div>
                        <div class="col-lg-4">
                            <label>Cadastrado em</label>
                            <p><?php echo h($indicadoresAno['IndicadoresAno']['created']); ?></p>
                        </div>
                        <div class="col-lg-4">
                            <label>Atualizado em</label>
                            <p><?php echo h($indicadoresAno['IndicadoresAno']['modified']); ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $areas = array();
                        $indicadores = array();
                        foreach ($indicadoresValores as $indicador) {
                            $areas[$indicador['IndicadoresItem']['indicador_area_id']] = $this->Util->mostraAreaIndicadores($indicador['IndicadoresItem']['indicador_area_id']);
                            $indicadores[$indicador['IndicadoresItem']['indicador_area_id']][$indicador['IndicadoresItem']['id']][$indicador['IndicadoresValor']['mes']] = $indicador;
                            $indicaresNome[$indicador['IndicadoresItem']['id']] = $indicador['IndicadoresItem']['nome'];
                        }
                        ?>
                        <div class="col-lg-12">
                            <ul class="nav nav-pills">
                                <?php
                                $i = 0;
                                foreach ($areas as $key => $area):
                                    $class = '';
                                    if ($i == 0) {
                                        $class = 'class="active"';
                                    }
                                    ?>
                                    <li <?= $class ?>><a href="#<?= $key ?>" data-toggle="tab"><?= $area ?></a></li>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                            </ul>
                            <p style="clear: both"></p>
                            <?php echo $this->Form->create('IndicadoresAno', array('role' => 'form')); ?>
                            <div class="tab-content">
                                <?php
                                $i = 0;
                                foreach ($indicadores as $area => $itens):
                                    $class = '';
                                    if ($i == 0) {
                                        $class = 'active';
                                    }
                                    ?>
                                    <div class="tab-pane fade in <?= $class ?>" id = "<?= $area ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4><?= $areas[$area] ?></h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center; width: 22%">Indicador</th>
                                                                    <th style="text-align: center; width: 6%">Meta</th>
                                                                    <?php
                                                                    for ($i = 1; $i <= 12; $i++):
                                                                        ?>
                                                                        <th style="text-align: center"><?php echo $this->Util->mesesAbr($i); ?></th>
                                                                        <?php
                                                                    endfor;
                                                                    ?>
                                                                    <th style="text-align: center;">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($itens as $key => $meses):
                                                                    ?>
                                                                    <tr>
                                                                        <td rowspan="2" style="vertical-align: middle;"><?= $indicaresNome[$key] ?></td>
                                                                        <td style="text-align: center">Previsto</td>
                                                                        <?php
                                                                        $somaPrevista = 0;
                                                                        foreach ($meses as $mes => $valores):
                                                                            $inteiro = '';
                                                                            $unidadeMendida = $this->Util->unidadeMedida($valores['IndicadoresItem']['unidade_medida_id']);
                                                                            if ($unidadeMendida['UnidadesMedida']['tipo_valor'] == 'F') {
                                                                                $inteiro = 'class="moeda"';
                                                                            }
                                                                            $somaPrevista += $this->Formatacao->removeFormatacaoMonetaria($valores['IndicadoresValor']['previsto']);
                                                                            ?>
                                                                            <td style="text-align: center">
                                                                                <input type="text" id="previsto" <?= $inteiro ?> 
                                                                                       onkeypress="return OnlyNumbers(event)" 
                                                                                       name="data[IndicadoresValor][<?= $valores['IndicadoresValor']['id'] ?>][previsto]" 
                                                                                       maxlength="10"  
                                                                                       style="width: 100%" value="<?= $valores['IndicadoresValor']['previsto'] ?>">
                                                                            </td>
                                                                            <?php
                                                                        endforeach;
                                                                        ?>
                                                                        <td style="text-align: center">
                                                                            <b>
                                                                                <?php
                                                                                if(!empty($inteiro)){
                                                                                echo number_format($somaPrevista, 0, '', '.');
                                                                                }else{
                                                                                echo $somaPrevista;
                                                                                }
                                                                                ?>
                                                                            </b>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: center">Realizado</td>
                                                                        <?php
                                                                        $somaRealizada = 0;
                                                                        foreach ($meses as $mes => $valores):
                                                                            $inteiro = '';
                                                                            $cor = '';
                                                                            $unidadeMendida = $this->Util->unidadeMedida($valores['IndicadoresItem']['unidade_medida_id']);
                                                                            if ($unidadeMendida['UnidadesMedida']['tipo_valor'] == 'F') {
                                                                                $inteiro = 'class="moeda"';
                                                                            }
                                                                            $valorPrevisto = $this->Formatacao->removeFormatacaoMonetaria($valores['IndicadoresValor']['previsto']);
                                                                            $valorRealizado = $this->Formatacao->removeFormatacaoMonetaria($valores['IndicadoresValor']['realizado']);
                                                                            $somaRealizada += $valorRealizado;
                                                                            if (empty($valores['IndicadoresItem']['tolerancia_abaixo_meta']) or $valores['IndicadoresItem']['tolerancia_abaixo_meta'] == 0) {
                                                                                $percentualToleranciaAbaixo = 5;
                                                                            } else {
                                                                                $percentualToleranciaAbaixo = $valores['IndicadoresItem']['tolerancia_abaixo_meta'];
                                                                            }

                                                                            if (empty($valores['IndicadoresItem']['tolerancia_acima_meta']) or $valores['IndicadoresItem']['tolerancia_acima_meta'] == 0) {
                                                                                $percentualToleranciaAcima = 5;
                                                                            } else {
                                                                                $percentualToleranciaAcima = $valores['IndicadoresItem']['tolerancia_acima_meta'];
                                                                            }

                                                                            $toleranciaAbaixoMeta = 1 - ($percentualToleranciaAbaixo / 100);
                                                                            $toleranciaAcimaMeta = 1 + ($percentualToleranciaAcima / 100);

                                                                            $superouMeta = $valorPrevisto * $toleranciaAcimaMeta;
                                                                            $abaixoMeta = $valorPrevisto * $toleranciaAbaixoMeta;

                                                                            $relacaoMeta = $valores['IndicadoresItem']['relacao_meta'];

                                                                            if ($relacaoMeta == '>') {
                                                                                if (!empty($valorRealizado)) {
                                                                                    if ($valorRealizado >= $superouMeta) {
                                                                                        //Azul
                                                                                        $cor = '#00b0f0';
                                                                                    } elseif ($valorRealizado >= $valorPrevisto and $valorRealizado < $superouMeta) {
                                                                                        //Verde
                                                                                        $cor = '#66ff33';
                                                                                    } elseif ($valorRealizado < $valorPrevisto and $valorRealizado >= $abaixoMeta) {
                                                                                        //Amarelo
                                                                                        $cor = '#f2ea4e';
                                                                                    } else {
                                                                                        //Vermelho
                                                                                        $cor = '#ff0000';
                                                                                    }
                                                                                } elseif ($valorRealizado == 0 and $valorPrevisto > 0) {
                                                                                    //Vermelho
                                                                                    $cor = '#ff0000';
                                                                                }
                                                                            } elseif ($relacaoMeta == '<') {
                                                                                if (!empty($valorRealizado)) {
                                                                                    if ($valorRealizado <= $superouMeta) {
                                                                                        //Azul
                                                                                        $cor = '#00b0f0';
                                                                                    } elseif ($valorRealizado <= $valorPrevisto and $valorRealizado > $superouMeta) {
                                                                                        //Verde
                                                                                        $cor = '#66ff33';
                                                                                    } elseif ($valorRealizado > $valorPrevisto and $valorRealizado <= $abaixoMeta) {
                                                                                        //Amarelo
                                                                                        $cor = '#f2ea4e';
                                                                                    } else {
                                                                                        //Vermelho
                                                                                        $cor = '#ff0000';
                                                                                    }
                                                                                } elseif ($valorRealizado == 0 and $valorPrevisto < 0) {
                                                                                    //Vermelho
                                                                                    $cor = '#ff0000';
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <td style="text-align: center; background-color: <?= $cor ?>">
                                                                                <input type="text" id="realizado" <?= $inteiro ?> onkeypress = "return OnlyNumbers(event)" name="data[IndicadoresValor][<?= $valores['IndicadoresValor']['id'] ?>][realizado]" maxlength="10" style="width: 90%" value="<?= $valores['IndicadoresValor']['realizado'] ?>">
                                                                            </td>
                                                                            <?php
                                                                        endforeach;
                                                                        $superouMeta = $somaRealizada * $toleranciaAcimaMeta;
                                                                        $abaixoMeta = $somaPrevista * $toleranciaAbaixoMeta;
                                                                        if ($relacaoMeta == '>') {
                                                                            if (!empty($somaRealizada)) {
                                                                                if ($somaRealizada >= $superouMeta) {
                                                                                    //Azul
                                                                                    $cor = '#00b0f0';
                                                                                } elseif ($somaRealizada >= $somaPrevista and $somaRealizada < $superouMeta) {
                                                                                    //Verde
                                                                                    $cor = '#66ff33';
                                                                                } elseif ($somaRealizada < $somaPrevista and $somaRealizada >= $abaixoMeta) {
                                                                                    //Amarelo
                                                                                    $cor = '#f2ea4e';
                                                                                } else {
                                                                                    //Vermelho
                                                                                    $cor = '#ff0000';
                                                                                }
                                                                            } elseif ($somaRealizada == 0 and $somaPrevista > 0) {
                                                                                //Vermelho
                                                                                $cor = '#ff0000';
                                                                            }
                                                                        } elseif ($relacaoMeta == '<') {
                                                                            if (!empty($somaRealizada)) {
                                                                                if ($somaRealizada <= $superouMeta) {
                                                                                    //Azul
                                                                                    $cor = '#00b0f0';
                                                                                } elseif ($somaRealizada <= $somaPrevista and $somaRealizada > $superouMeta) {
                                                                                    //Verde
                                                                                    $cor = '#66ff33';
                                                                                } elseif ($somaRealizada > $somaPrevista and $somaRealizada <= $abaixoMeta) {
                                                                                    //Amarelo
                                                                                    $cor = '#f2ea4e';
                                                                                } else {
                                                                                    //Vermelho
                                                                                    $cor = '#ff0000';
                                                                                }
                                                                            } elseif ($somaRealizada == 0 and $somaPrevista < 0) {
                                                                                //Vermelho
                                                                                $cor = '#ff0000';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <td style="text-align: center; background-color: <?= $cor ?>">
                                                                            <b>
                                                                                <?php
                                                                                if (!empty($inteiro)) {
                                                                                    echo number_format($somaRealizada, 0, '', '.');
                                                                                } else {
                                                                                    echo $somaRealizada;
                                                                                }
                                                                                ?>
                                                                            </b>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                endforeach;
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                endforeach;
                                ?>
                                <button class="btn btn-primary" type="submit">Salvar</button>
                            </div>
                            <?php echo $this->Form->end(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div><!-- end containing of content -->