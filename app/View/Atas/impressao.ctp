<!DOCTYPE HTML>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="<?=$this->base?>/css/bootstrap/css/bootstrap.css">

<title></title>
<style>
@media print {
    * {
    background:transparent !important;
    color:#000 !important;
    text-shadow:none !important;
    filter:none !important;
    -ms-filter:none !important;
    }

    body {
    margin:0;
    padding:0;
    line-height: 1.4em;
    }
}
@page {
	/*margin: 0.5cm;*/
}
.show-grid [class^="col-"] {
    border: 1px solid #000;
    padding-bottom: 10px;
    padding-top: 10px;
}
.border-div{
    border: 1px solid #000;
}
</style>
</head>

<body>

<div class="container">
    <header>
		<div class="row" style="height: 65px;">
			<div class="col-sm-3" style="margin-top: 15px">
				<img src="<?=$this->base?>/img/logorede.png" />
			</div>
			<div class="col-sm-6" style="text-align: center">
				<h3><strong>Ata de Atendimento - Nº <?=$ata['Ata']['id']?></strong></h3>
			</div>
			<div class="col-sm-3">
				<h5><strong>Projeto</strong></h5>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-12">
              <div class="row">
         	    <div class="col-sm-4 border-div">
        		    <h5><strong>Cliente</strong></h5>
                    <p>&nbsp;<?php echo h($ata['Cliente']['razao_social']); ?></p>
        		</div>
         		<div class="col-sm-3 border-div">
        		    <h5><strong>Tipo de Reunião</strong></h5>
                    <p>&nbsp;<?php echo $this->Util->tiposAtas($ata['Ata']['tipo']); ?></p>
        		</div>
         		<div class="col-sm-5 border-div">
         		    <h5><strong>Responsável pela Reunião</strong></h5>
                    <p>&nbsp;</p>
         		</div>
              </div>
              <div class="row">
     			<div class="col-sm-4 border-div" style="height: 60px;">
    			    <h5><strong>Título</strong></h5>
                    <p><?php echo h($ata['Ata']['titulo']); ?></p>
    			</div>
     			<div class="col-sm-3 border-div" style="height: 60px;">
    			    <h5><strong>Local</strong></h5>
                    <p><?php echo h($ata['Ata']['local']); ?></p>
    			</div>
     			<div class="col-sm-2 border-div" style="height: 60px;">
     				<h5><strong>Data</strong></h5>
                    <p><?php echo h($ata['Ata']['data']); ?></p>
     			</div>
     			<div class="col-sm-3 border-div" style="height: 60px;">
     				<h5><strong>Horário</strong></h5>
                    <p><?php echo h($ata['Ata']['inicio']); ?> a <?php echo h($ata['Ata']['termino']); ?></p>
     			</div>
              </div>
              <div class="row">
                <div class="col-sm-6 border-div" style="height: 90px;">
    				<h5 style="text-align: center"><strong>Presentes</strong></h5>
                    <p><?php echo h($ata['Ata']['presentes']); ?></p>
    			</div>
     			<div class="col-sm-6 border-div" style="height: 90px;">
    				<h5 style="text-align: center"><strong>Assinaturas</strong></h5>
    			</div>
              </div>
            </div>
        </div>
    </header>
    <main>
        <div class="col-lg-12">
            <div class="row">
              <div class="row">
     			<div class="col-sm-12 border-div" style="min-height: 130px;">
    				<h5><strong>Assuntos discutidos na reunião</strong></h5>
                    <p><?php echo nl2br($ata['Ata']['assuntos_discutidos']); ?></p>
    			</div>
    		  </div>
              <div class="row">
     			<div class="col-sm-12 border-div" style="min-height: 130px;">
    				<h5><strong>Conclusões da reunião</strong></h5>
                    <p><?php echo nl2br($ata['Ata']['conclucoes']); ?></p>
    			</div>
              </div>
              <div class="row">
                <div class="col-sm-12 border-div">
                    <br />
				    <table cellspacing="0" cellpadding="0" class="table" border="1px" style="border: 1px solid #000 !important">
                        <thead>
                            <th style="text-align: center; width: 60%">Compromissos (Ações Corretivas / Preventivas)</th>
                            <th style="text-align: center; width: 20%">Responsável</th>
                            <th style="text-align: center; width: 20%">Data Limite</th>
                        </thead>
				        <tbody>
                        <?php
                            $linhas = 0;
                            if(!empty($ata['Tarefa'])):
                                $linhas = count($ata['Tarefa']);
                                foreach($ata['Tarefa'] as $tarefa):
                        ?>
                                  <tr>
                                      <td><?=$tarefa['tarefa']?>&nbsp;</td>
                                      <td><?=$this->Util->mostraNomeColaborador($tarefa['colaborador_id'])?>&nbsp;</td>
                                      <td><?=$this->Formatacao->data($tarefa['inicio'])?> - <?=$this->Formatacao->data($tarefa['termino'])?></td>
                                  </tr>
                        <?php
                                endforeach;
                                $linhas = 5 - $linhas;
                            endif;
                            if($linhas >= 0):
                                for($i = $linhas; $i<=7; $i++):
                        ?>
                                  <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                  </tr>
                        <?php
                                endfor;
                            endif;
                        ?>
				        </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
        <div class="row" style="margin-top: 5px">
            <div class="col-lg-12">
              <div class="row">
     			<div class="col-sm-12">
    			    <h5 style="text-align: center"><strong>Agenda para a Próxima Reunião</strong></h5>
    			</div>
    		  </div>
              <div class="row">
     			<div class="col-sm-2 border-div">
     				<h5><strong>Data</strong></h5>
                    <?php echo h($ata['Ata']['px_reuniao_data']); ?>&nbsp;
     			</div>
     			<div class="col-sm-2 border-div">
     				<h5><strong>Hora</strong></h5>
                    <?php echo h($ata['Ata']['px_reuniao_inicio']); ?> - <?php echo h($ata['Ata']['px_reuniao_termino']); ?>&nbsp;
     			</div>
     			<div class="col-sm-8 border-div">
     				<h5><strong>Local</strong></h5>
                    <?php echo h($ata['Ata']['px_reuniao_local']); ?>&nbsp;
     			</div>
              </div>
              <div class="row">
     			<div class="col-sm-12 border-div">
    			    <h5><strong>Pauta</strong></h5>
                    <?php echo h($ata['Ata']['px_reuniao_pauta']); ?>&nbsp;
    			</div>
    		  </div>
            </div>
        </div>
	</main>
</div>
</body>
</html>
<script LANGUAGE="JavaScript">

$( document ).ready(function() {
    window.print();
});


</script>