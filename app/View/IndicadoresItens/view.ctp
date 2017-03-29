<div class="indicadoresItens index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicador'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Visualizar</h4>
					<ul class="links">
    				    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar'), array('action' => 'edit', $indicadoresItem['IndicadoresItem']['id']), array('escape' => false)); ?> </li>
                		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $indicadoresItem['IndicadoresItem']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $indicadoresItem['IndicadoresItem']['id'])); ?> </li>
                		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?> </li>
                		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?> </li>
					</ul>
                </div>
                <div class="panel-body">
                    <div class="row">
		                <div class="col-lg-3">
                            <label>Área</label>
                            <p><?=$indicadoresItem['IndicadoresArea']['nome']?></p>
                        </div>
		                <div class="col-lg-4">
                            <label>Indicador</label>
                            <p><?=$indicadoresItem['IndicadoresItem']['nome']?></p>
                        </div>
		                <div class="col-lg-3">
                            <label>Unidade de Medida</label>
                            <p><?=$indicadoresItem['UnidadesMedida']['nome']?></p>
                        </div>
		                <div class="col-lg-2">
                            <label>Relação Meta</label>
                            <p><?=$this->Util->indicadorRelacaoMeta($indicadoresItem['IndicadoresItem']['relacao_meta'])?></p>
                        </div>
                    </div>
                    <div class="row">
		                <div class="col-lg-3">
                            <label>Tolerância</label>
                            <p><b>Abaixo Meta</b>: <?=$indicadoresItem['IndicadoresItem']['tolerancia_abaixo_meta']?>% - <b>Acima Meta</b>: <?=$indicadoresItem['IndicadoresItem']['tolerancia_acima_meta']?>%</p>
                        </div>
		                <div class="col-lg-3">
                            <label>Ativo</label>
                            <p><?php echo $this->Util->statusAtivo($indicadoresItem['IndicadoresItem']['ativo']); ?></p>
                        </div>
		                <div class="col-lg-3">
                            <label>Cadastrado em</label>
                            <p><?php echo h($indicadoresItem['IndicadoresItem']['created']); ?></p>
                        </div>
		                <div class="col-lg-3">
                            <label>Atualizado em</label>
                            <p><?php echo h($indicadoresItem['IndicadoresItem']['created']); ?></p>
                        </div>
                    </div>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->