<?php
    $inicio = date('Y-m-d');
    foreach($respostasLevantamento as $resposta){
      foreach($resposta['Tarefa'] as $tarefa){
        if(!empty($tarefa['inicio'])){
            if($tarefa['inicio'] < $inicio){
                $inicio = $tarefa['inicio'];
            }
        }
      }
    }
    list($ano, $mes, $dia) = explode('-', $inicio);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://redeinclusao.org.br/v2/css/bootstrap/css/bootstrap.css" />
    <style>
      body {
        font-size: 7pt;
      }
      table { page-break-after:auto }
      tr    { page-break-inside:avoid; page-break-after:auto }
      td    { page-break-inside:avoid; page-break-after:auto }
      thead { display:table-header-group }
      tfoot {
        display:table-footer-group;
        border-bottom: hidden;
        border-left: hidden;
        border-right: hidden;
      }

	  .clear {
		clear: both;
	  }
	  #logo {
		float: left;
		height: 40px;
		margin: 0 110px 0 0;
		width: 200px;
	  }
      #logo a img {
        height: 37px;
    	width: 200px;
      }
	  #informacoes {
		float: left;
		height: 40px;
        text-align: center;
	  }
	  #informacoes h3, p {
	    margin: 0;
	  }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div style="margin:20px;">
        <div id="logo">
            <a class="navbar-brand" href="#"><img src="http://redeinclusao.org.br/v2/img/logorede.png" width="50%" /></a>
        </div>
        <div id="informacoes">
            <h3>Plano de Ação IMGI - <?=$respostasLevantamento[0]['Cliente']['razao_social']?></h3>
        </div>
        <div class="clear"></div>
        </div>
        <table class="table table-bordered">
            <thead style="background-color:#F79646;">
                <th style="text-align:center;">Subáreas IMGI</th>
            	<th style="text-align:center;">O que faremos?</th>
                <th style="text-align:center;">Status</th>
                <?php
                    for($i = 0; $i<12; $i++):
                        $mesAno = date("m/y",mktime(0,0,0,$mes+$i,$dia,$ano));
                        list($mesAbr, $anoAbr) = explode('/', $mesAno);
                ?>
            	        <th style="text-align:center;"><?=$this->Util->mesesAbr($mesAbr)?>/<?=$anoAbr?></th>
                <?php
                    endfor;
                ?>
            </thead>
            <tfoot>
                <tr><td colspan="15"></td></tr>
            </tfoot>
            <tbody>
          	<?php
          		$i = 0;
          		foreach($respostasLevantamento as $resposta):
                    $tipo = $this->Util->mostraTiposPerguntasLevantamento($resposta['PerguntasLevantamento']['tipo_pergunta_levantamento_id']);
                    $numTarefa = count($resposta['Tarefa']);
                    if($numTarefa == 0):
            ?>
              		    <tr>
              			    <td align="center" style="vertical-align: middle; background-color: #d9d9d9;"><b><?php echo $tipo['TiposPerguntasLevantamento']['nome']?></b></td>
              			    <td> &nbsp; </td>
              			    <td> &nbsp; </td>
                           <?php
                                for($i = 0; $i<12; $i++):
                            ?>
              			            <td> &nbsp; </td>
                            <?php
                                endfor;
                            ?>
                        </tr>
                <?php
                    else:
                        $i = 1;
                        foreach($resposta['Tarefa'] as $tarefa):
                            if($i == 1):
                ?>
                    		    <tr>
                    			    <td align="center" rowspan="<?=$numTarefa?>" style="vertical-align: middle; background-color: #d9d9d9;"><b><?php echo $tipo['TiposPerguntasLevantamento']['nome']?></b></td>
                    			    <td><?=$tarefa['tarefa']?>&nbsp; </td>
                                    <td style="color:#fff; background-color: <?=$this->Util->coresStatusAtividades($tarefa['status'])?>"><?php echo (!empty($tarefa['status']))?$this->Util->statusAtividades($tarefa['status']):''; ?>&nbsp;</td>
                                    <?php
                                        for($i = 0; $i<12; $i++):
                                            $mesAno = date("Ym",mktime(0,0,0,$mes+$i,$dia,$ano));
                                            $preenchido = '';
                                            if(!empty($tarefa['inicio']) and !empty($tarefa['termino'])){
                                                list($anoTI, $mesTI, $diaTI) = explode('-', $tarefa['inicio']);
                                                list($anoTT, $mesTT, $diaTT) = explode('-', $tarefa['termino']);
                                                if($anoTI.$mesTI <= $mesAno and $anoTT.$mesTT >= $mesAno){
                                                  $preenchido = 'style="background-color: #0A075F;"';
                                                }
                                            }
                                    ?>
                      			            <td <?=$preenchido?>> &nbsp;</td>
                                    <?php
                                        endfor;
                                    ?>
                                </tr>
                        <?php
                            else:
                        ?>
                    		    <tr>
                    			    <td><?=$tarefa['tarefa']?>&nbsp; </td>
                                    <td style="color:#fff; background-color: <?=$this->Util->coresStatusAtividades($tarefa['status'])?>"><?php echo (!empty($tarefa['status']))?$this->Util->statusAtividades($tarefa['status']):''; ?>&nbsp;</td>
                                    <?php
                                        for($i = 0; $i<12; $i++):
                                            $mesAno = date("Ym",mktime(0,0,0,$mes+$i,$dia,$ano));
                                            $preenchido = '';
                                            if(!empty($tarefa['inicio']) and !empty($tarefa['termino'])){
                                                list($anoTI, $mesTI, $diaTI) = explode('-', $tarefa['inicio']);
                                                list($anoTT, $mesTT, $diaTT) = explode('-', $tarefa['termino']);
                                                if($anoTI.$mesTI <= $mesAno and $anoTT.$mesTT >= $mesAno){
                                                  $preenchido = 'style="background-color: #0A075F;"';
                                                }
                                            }
                                    ?>
                      			            <td <?=$preenchido?>> &nbsp;</td>
                                    <?php
                                        endfor;
                                    ?>
                                </tr>
      	    <?php
                            endif;
                            $i++;
                        endforeach;
                    endif;
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
