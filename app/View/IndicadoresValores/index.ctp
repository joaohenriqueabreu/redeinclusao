<div class="indicadoresValores index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Valores'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listagem</h4>
					<ul class="links">
					    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
        			<p>
        				<small><?php echo $this->Paginator->counter(array('format' => __('<b>Página {:page}</b> (do total {:pages}) - <b>exibindo de {:start} a {:end}</b> (do total {:count} registro(s)')));?></small>
        			</p>
        			<table cellpadding="0" cellspacing="0" class="table table-striped">
        				<thead>
        					<tr>
        			        			<th><?php echo $this->Paginator->sort('id'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('indicador_item_id'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('ano'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('mes'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('meta'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('realizado'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('created'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('modified'); ?></th>
        			        			<th class="actions">Ações</th>
        					</tr>
        				</thead>
        				<tbody>
        				<?php foreach ($indicadoresValores as $indicadoresValor): ?>
					<tr>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['id']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($indicadoresValor['IndicadoresItem']['id'], array('controller' => 'indicadores_itens', 'action' => 'view', $indicadoresValor['IndicadoresItem']['id'])); ?>
		</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['ano']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['mes']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['meta']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['realizado']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($indicadoresValor['User']['id'], array('controller' => 'useres', 'action' => 'view', $indicadoresValor['User']['id'])); ?>
		</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['created']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresValor['IndicadoresValor']['modified']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $indicadoresValor['IndicadoresValor']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $indicadoresValor['IndicadoresValor']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $indicadoresValor['IndicadoresValor']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $indicadoresValor['IndicadoresValor']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
        				</tbody>
        			</table>
        			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
        			<ul class="pagination pagination-sm">
        				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
        			</ul>
        			<?php } ?>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->