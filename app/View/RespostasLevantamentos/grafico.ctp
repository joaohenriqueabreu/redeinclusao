<style type="text/css">
    *{
        font-family: calibri;
    }

    .box {
        margin: 0px auto;
        width: 70%;
    }

    .box-chart {
        width: 100%;
        margin: 0 auto;
        padding: 10px;
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
        height: 30px;
        width: 350px;
    }
    #informacoes h1, p {
        margin: 0;
    }
</style>
<?php
echo $this->Html->css('charts/dhtmlxchart');
echo $this->Html->script('charts/dhtmlxchart', array('block' => 'customArchives'));

$dados = array();
$topicos = array();

$chaves = array();
$primeiroPreenchimento = array();
foreach ($respostas as $resposta) {
    if ($resposta['RespostasLevantamento']['chave'] == $primeiraChave['RespostasLevantamento']['chave']) {
        $primeiroPreenchimento[] = $resposta;
    }
    $dados[$resposta['PerguntasLevantamento']['tipo_pergunta_levantamento_id']]['cenario' . $resposta['RespostasLevantamento']['chave']] = $resposta['RespostasLevantamento']['resposta'];
    $chaves['cenario' . $resposta['RespostasLevantamento']['chave']] = $resposta['RespostasLevantamento']['created'];
}

$indiceMedia = 0;
$somaMedia = 0;
$media = 0;
foreach ($primeiroPreenchimento as $resposta) {
//    if ($resposta['RespostasLevantamento']['resposta'] > 0) {
        $indiceMedia++;
        $somaMedia += $resposta['RespostasLevantamento']['resposta'];
//    }
}
if ($indiceMedia > 0) {
    $media = round($somaMedia / $indiceMedia, 0, PHP_ROUND_HALF_DOWN);
}

foreach ($tiposPerguntas as $tipo) {
    $dados[$tipo['TiposPerguntasLevantamento']['id']]['media'] = $media;
    $topicos[$tipo['TiposPerguntasLevantamento']['id']] = $tipo['TiposPerguntasLevantamento']['nome'];
}



$dadosOrdernados = array();
foreach ($dados as $topico => $valores):
    $dadosOrdernados[$topicos[$topico]] = $valores;
endforeach;
ksort($dadosOrdernados);


$legenda = '{text: "Média", color:"' . $this->Util->geraRGB(0) . '"},';
$i = 1;
foreach ($chaves as $chave => $created) {
    $dia = explode(' ', $created);
    $legenda .= '{text: " Preenchido em: ' . $dia[0] . '", color:"' . $this->Util->geraRGB($i) . '"},';
    $i++;
}

$data = '';
foreach ($dadosOrdernados as $topico => $valores) {
    $data .= '{';
    foreach ($valores as $chave => $valor) {
        $data .= '"' . $chave . '":"' . $valor . '",';
    }
    $data .= '"topico":"' . $topico . '"},';
}
$data = substr($data, 0, -1);
$legenda = substr($legenda, 0, -1);
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
var companies=[<?= $data ?>];
myRadarChart =  new dhtmlXChart({
view:"radar",
container:"chartDiv",
value:"#media#",
preset:"line",
tooltip:{
template:"#media#"
},
line:{
color:"<?= $this->Util->geraRGB(0) ?>",
width:2
},
item:{
color:"#ffffff",
borderColor:"<?= $this->Util->geraRGB(0) ?>",
radius:2,
borderWidth:2,
type:"d"
},
xAxis:{
template:"#topico#"
},
yAxis:{
lineShape:"arc",
start:0,
step:1,
end:5
},
legend:{
layout:"y",
width: 160,
align:"right",
valign:"middle",
values:[<?= $legenda ?>]
}
});
<?php
$i = 1;
foreach ($chaves as $chave => $data):
    ?>
    myRadarChart.addSeries({
    value:"#<?= $chave ?>#",
    tooltip:{
    template:"#<?= $chave ?>#"
    },
    line:{
    color:"<?= $this->Util->geraRGB($i); ?>",
    width:2
    },
    item:{
    color:"#ffffff",
    borderColor:"<?= $this->Util->geraRGB($i); ?>",
    radius:2,
    borderWidth:2,
    type:"s"
    }
    });
    <?php
    $i++;
endforeach;
?>
myRadarChart.parse(companies,"json");
window.print();
<?php echo $this->Html->scriptEnd(); ?>
<div style="width:820px;height:40px;margin:20px;">
    <div id="logo">
        <a class="navbar-brand" href="<?= $this->base ?>"><img src="<?= $this->base ?>/img/logorede.png" width="45%" /></a>
    </div>
    <div id="informacoes">
        <h1>Gráfico IMGI</h1>
    </div>
    <div class="clear"></div>
</div>
<div style="width:820px;height:1px;margin:20px;">
    <hr />
</div>
<div style="width:820px;height:45px;margin:20px;">
    <p><b>Cliente:</b> <?= $cliente['Cliente']['razao_social'] ?></p>
</div>
<div id="chartDiv" style="width:820px;height:420px;margin:20px;"></div>
