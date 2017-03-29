<div class="indicadoresAreas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Areas'); ?></h1>
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
        			        			<th><?php echo $this->Paginator->sort('nome'); ?></th>
        			        			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
        			        			<th class="actions">Ações</th>
        					</tr>
        				</thead>
        				<tbody>
        				<?php foreach ($indicadoresAreas as $indicadoresArea): ?>
					<tr>
						<td><?php echo h($indicadoresArea['IndicadoresArea']['id']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresArea['IndicadoresArea']['nome']); ?>&nbsp;</td>
						<td><?php echo h($indicadoresArea['IndicadoresArea']['ativo']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $indicadoresArea['IndicadoresArea']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $indicadoresArea['IndicadoresArea']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $indicadoresArea['IndicadoresArea']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $indicadoresArea['IndicadoresArea']['id'])); ?>
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