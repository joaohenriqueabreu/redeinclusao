<div class="row">
	<div class="col-md-12">
		<h3><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h3>
		<p>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#"><?php echo Inflector::humanize($action) .' '. $singularHumanName;?></a></li>
			<?php if (strpos($action, 'add') === false): ?>
					<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array(), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
			<?php endif; ?>
					<li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
			<?php
					$done = array();
					foreach ($associations as $type => $data) {
						foreach ($data as $alias => $details) {
							if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
								echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
								echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
								$done[] = $details['controller'];
							}
						}
					}
			?>
		</ul>
		</p>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
			<fieldset>
		<?php
				echo "\t<?php\n";
				foreach ($fields as $field) {
					if (strpos($action, 'add') !== false && $field === $primaryKey) {
						continue;
					} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
						echo "\t\techo \$this->Form->input('{$field}');\n";
					}
				}
				if (!empty($associations['hasAndBelongsToMany'])) {
					foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
						echo "\t\techo \$this->Form->input('{$assocName}');\n";
					}
				}
				echo "\t?>\n";
		?>
			</fieldset>
		<div class="form-group">
			<label for="ImagemSubmit" class="control-label col-sm-2"></label>
			<div class="col-sm-10">
				<?php
					echo "<?php echo \$this->Form->button('Salvar', array('type'=>'submit','class'=>'btn btn-danger')); ?>\n";
				?>
			</div>
		</div>
		<?php
			echo "<?php echo \$this->Form->end(); ?>\n";
		?>
	</div>
</div>

