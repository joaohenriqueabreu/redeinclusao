<?php echo $this->Form->create('QuizPergunta', array('class'=>'form_busca')); ?>
	<fieldset>
		<legend><?php echo __('Filtro'); ?></legend>
	<?php
	    echo $this->Form->input('disciplina_id', array('div'=>array('style'=>'width: 40%'), 'empty'=>'Selecione', 'class'=>'required'));
        echo $this->Form->input('materia_id', array('div'=>array('class'=>'input select', 'style'=>'width: 40%'), 'empty'=>'Selecione', 'options'=>$materias));
        echo $this->Form->end(__('Submit'));
	?>
	</fieldset>