<?php
echo $this->Html->css('bootstrap/css/bootstrap-modal-carousel.min');
?>
<?php echo $this->Html->scriptStart(array('block' => 'codesJavaScripts')); ?>
$(function() {
$('#RespostasLevantamentoViewForm').submit(function(){
$.ajax({
type: "POST",
url: "<?= $this->base ?>/RespostasLevantamentos/salva",
beforeSend: function() {
// setting a timeout
$('#processing-modal').modal('show');
},
data: new FormData( this ),
processData: false,
contentType: false,
success: function( retorno ) {
if(retorno == 1){
bootbox.alert("Cadastrado salvo com sucesso.",
function(){
$('#processing-modal').modal('hide');
}
);
}else{
bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
}
}
});
return false;
});
});
<?php echo $this->Html->scriptEnd(); ?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
    <div class="page-title">
        <h1 class="page-header">Questionário IMGI - Cliente: <?= $respostasLevantamento[0]['Cliente']['razao_social'] ?></h1>
    </div>
</div>
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-6 col-sx-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Respostas - Preenchido em <?= $this->Util->format_date($respostasLevantamento[0]['RespostasLevantamento']['created']) ?></h4>
                        <ul class="links">
                            <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a>'), array('controller' => 'clientes', 'action' => 'view', $respostasLevantamento[0]['Cliente']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<i class="fa fa-building"></i>&nbsp;&nbsp;PA</a>'), array('action' => 'view', $this->params['pass'][0], 'ext' => 'pdf'), array('escape' => false, 'target' => '_blank')); ?> </li>
                            <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>&nbsp&nbsp;Editar'), array('action' => 'edit', $respostasLevantamento[0]['RespostasLevantamento']['chave']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="fa fa-bar-chart-o fa-fw"></span>Gráfico'), array('controller' => 'RespostasLevantamentos', 'action' => 'grafico', $respostasLevantamento[0]['Cliente']['id'], $respostasLevantamento[0]['RespostasLevantamento']['chave']), array('escape' => false, 'target' => '_blank')); ?></li>
                            <li><?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $respostasLevantamento[0]['RespostasLevantamento']['chave'], $respostasLevantamento[0]['Cliente']['id']), array('escape' => false), __('Deseja remover o registro # %s?', $respostasLevantamento[0]['RespostasLevantamento']['chave'], $respostasLevantamento[0]['Cliente']['id'])); ?> </li>
                        </ul>
                    </div>
                    <div class="table-dataTable_wrapper panel-body">
                        <?php
                        echo $this->Form->create('RespostasLevantamento', array('role' => 'form'));
                        ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th><?php echo __('Dimensão'); ?></th>
                                <th><?php echo __('Temas (variáveis) IMGI'); ?></th>
                                <th style="width: 20%"><?php echo __('Situação'); ?></th>
                                <th><?php echo __('Média'); ?></th>
                                <th><?php echo __('Validação'); ?></th>
                                <th><?php echo __('Ação'); ?></th>
                            </tr>
                            <?php
                            $i = 0;
                            $somaRespostas = 0;
                            $somaMedias = 0;
                            $indicadorMedia = 0;
                            $mediaRespostas = 0;
                            foreach ($respostasLevantamento as $resposta) {
//                                if ($resposta['RespostasLevantamento']['resposta'] > 0) {
                                $indicadorMedia++;
//                                }
                                $somaRespostas += $resposta['RespostasLevantamento']['resposta'];
                            }
                            if ($indicadorMedia > 0) {
                                $mediaRespostas = round($somaRespostas / $indicadorMedia, 0, PHP_ROUND_HALF_DOWN);
                            }

                            $respostasLevantamentoOrdernadas = array();
                            foreach ($respostasLevantamento as $resposta):
                                $tipo = $this->Util->mostraTiposPerguntasLevantamento($resposta['PerguntasLevantamento']['tipo_pergunta_levantamento_id']);
                                $respostasLevantamentoOrdernadas[$tipo['TiposPerguntasLevantamento']['nome']] = $resposta;
                            endforeach;
                            ksort($respostasLevantamentoOrdernadas);

                            foreach ($respostasLevantamentoOrdernadas as $resposta):
                                $tipo = $this->Util->mostraTiposPerguntasLevantamento($resposta['PerguntasLevantamento']['tipo_pergunta_levantamento_id']);
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $tipo['TiposPerguntasLevantamento']['dimensao_imgi'] ?></td>
                                    <td><?php echo $tipo['TiposPerguntasLevantamento']['nome'] ?></td>
                                    <td><?php echo nl2br($resposta['RespostasLevantamento']['resposta'] . ' - ' . $resposta['PerguntasLevantamento']['pergunta']); ?></td>
                                    <td><?php echo $mediaRespostas; ?></td>
                                    <td>
                                        <?php
                                        echo $this->Form->input('validacao', array('style' => 'width: 100%', 'name' => 'data[RespostasLevantamento][' . $resposta['RespostasLevantamento']['id'] . '][validacao]', 'label' => false, 'type' => 'textarea', 'value' => $resposta['RespostasLevantamento']['validacao']));
                                        ?>
                                    </td>
                                    <td><a href="<?= $this->base ?>/Tarefas/add/<?= $resposta['RespostasLevantamento']['cliente_id'] ?>/<?= $resposta['RespostasLevantamento']['id'] ?>" data-toggle="modal", data-target="#myModal"><i class="glyphicon glyphicon-plus"></i></a></td>
                                </tr>
                                <?php
                                if (!empty($resposta['Tarefa'])):
                                    ?>
                                    <tr>
                                        <td colspan="6">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <th><?php echo __('Ação'); ?></th>
                                                    <th><?php echo __('Quando'); ?></th>
                                                    <th><?php echo __('Responsável'); ?></th>
                                                    <th><?php echo __('Status'); ?></th>
                                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                                </tr>
                                                <?php
                                                foreach ($resposta['Tarefa'] as $tarefa):
                                                    ?>
                                                    <tr>
                                                        <td class="col-sm-3" style="white-space: normal">&nbsp;<?php echo $tarefa['tarefa']; ?></td>
                                                        <td>&nbsp;<?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                        <td>&nbsp;<?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                        <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                        <td class="actions">
                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myModal', 'escape' => false)); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2"><b>Índice Geral de Maturidade em Gestão Inclusiva</b></td>
                                <td><b><?php echo $mediaRespostas; ?></b></td>
                                <td><b><?php echo $mediaRespostas; ?></b></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
    <!-- Spacer ends -->
</div>