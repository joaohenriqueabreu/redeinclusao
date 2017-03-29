<div class="unidadesMedidas index">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Unidades Medidas'); ?></h1>
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
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-index">
            				<thead>
            					<tr>
      			        			<th><?php echo $this->Paginator->sort('nome'); ?></th>
      			        			<th><?php echo $this->Paginator->sort('tipo_valor', 'Valor'); ?></th>
      			        			<th class="actions">Ações</th>
            					</tr>
            				</thead>
        				    <tbody>
        				    <?php foreach ($unidadesMedidas as $unidadesMedida): ?>
            					<tr>
            						<td><?php echo h($unidadesMedida['UnidadesMedida']['nome']); ?>&nbsp;</td>
            						<td><?php echo $this->Util->tiposValores($unidadesMedida['UnidadesMedida']['tipo_valor']); ?>&nbsp;</td>
            						<td class="actions">
            							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $unidadesMedida['UnidadesMedida']['id']), array('escape' => false)); ?>
            							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $unidadesMedida['UnidadesMedida']['id']), array('escape' => false)); ?>
            							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $unidadesMedida['UnidadesMedida']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $unidadesMedida['UnidadesMedida']['id'])); ?>
            						</td>
            					</tr>
				            <?php endforeach; ?>
        				    </tbody>
        			    </table>
                    </div>
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