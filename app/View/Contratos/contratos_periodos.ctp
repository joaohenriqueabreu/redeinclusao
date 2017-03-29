<script>
    $(document).ready(function(){
        var dates = $( "#ContratoDataInicio, #ContratoDataPrevistaTermino" ).datepicker({
    		changeMonth: true,
    		changeYear: true,
    		dateFormat: 'dd/mm/yy',
    		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    		onSelect: function( selectedDate ) {
    			var option = this.id == "ContratoDataInicio" ? "minDate" : "maxDate",
    			instance = $( this ).data( "datepicker" ),
    			date = $.datepicker.parseDate(
    				instance.settings.dateFormat ||
    				$.datepicker._defaults.dateFormat,
    				selectedDate, instance.settings );
    			dates.not( this ).datepicker( "option", option, date );
    		}
    	});

        $("#ContratosProdutosServicosEtapaPesquisaPeriodoForm").validate({
            submitHandler: function(form) {
                $('#loading_block').show();
                form.submit();
    	    }
        });
    });
</script>
<div class="contratos index">
    <fieldset class = "both">
        <legend>Pesquisa Términio Contratos por Período</legend>
        <?php
            $dataInicio = '';
            $dataPrevistaTermino = '';
            if(!empty($_GET['data_inicio'])){
                $dataInicio = $_GET['data_inicio'];
            }
            if(!empty($_GET['data_prevista_termino'])){
                $dataPrevistaTermino = $_GET['data_prevista_termino'];
            }
            echo $this->Form->create('Contrato', array('type'=>'get'));
            echo $this->Form->input('data_inicio', array('div'=>array('style'=>'width: 15%', 'class'=>'left'), 'value'=>$dataInicio, 'name'=>'data_inicio', 'type'=>'text', 'label'=>false, 'style'=>'height:30px', 'class'=>'required'));
            echo $this->Form->input('data_prevista_termino', array('div'=>array('style'=>'width: 15%', 'class'=>'left'), 'value'=>$dataPrevistaTermino, 'name'=>'data_prevista_termino', 'type'=>'text', 'label'=>false, 'style'=>'height:30px', 'class'=>'required'));
            echo $this->Form->submit(__('Pesquisar' ,true), array('div'=>array('class'=>'left')));
            echo $this->Form->end();
        ?>
    </fieldset>
    <?php
        if(!empty($contratos)): ?>
        <p class = "both">
        	<?php
        	echo $this->Paginator->counter(array(
            'format' => __('<b>Página {:page}</b> (do total {:pages}) - <b>exibindo de {:start} a {:end}</b> (do total {:count} registro(s))')
        	));
        	?>
        </p>
    	<table cellpadding="0" cellspacing="0">
    	<tr>
    			<th><?php echo $this->Paginator->sort('id', 'Cod.'); ?></th>
    			<th><?php echo $this->Paginator->sort('Cliente.nome', 'Cliente'); ?></th>
    			<th><?php echo $this->Paginator->sort('data'); ?></th>
    			<th><?php echo $this->Paginator->sort('inicio_vigencia', 'Início de Vigência'); ?></th>
    			<th><?php echo $this->Paginator->sort('termino_vigencia', 'Térmido de Vigência'); ?></th>
    			<th><?php echo $this->Paginator->sort('investimento'); ?></th>
    			<th><?php echo $this->Paginator->sort('created', 'Cadastrado em'); ?></th>
    			<th class="actions"><?php echo __('Actions'); ?></th>
    	</tr>
    	<?php
    	foreach ($contratos as $contrato): ?>
    	<tr>
    		<td><?php echo h($contrato['Contrato']['id']); ?>&nbsp;</td>
    		<td>
    			<?php echo $this->Html->link($contrato['Cliente']['razao_social'], array('controller' => 'clientes', 'action' => 'view', $contrato['Cliente']['id'])); ?>
    		</td>
    		<td><?php echo h($contrato['Contrato']['data']); ?>&nbsp;</td>
    		<td><?php echo h($contrato['Contrato']['inicio_vigencia']); ?>&nbsp;</td>
    		<td><?php echo h($contrato['Contrato']['termino_vigencia']); ?>&nbsp;</td>
    		<td><?php echo h($contrato['Contrato']['investimento']); ?>&nbsp;</td>
    		<td><?php echo h($contrato['Contrato']['created']); ?>&nbsp;</td>
    		<td class="actions">
    			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contrato['Contrato']['id'])); ?>
    		</td>
    	</tr>
    <?php endforeach; ?>
    	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
    <?php endif; ?>
</div>