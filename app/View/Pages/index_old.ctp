    <?php
        $dados = '';
        foreach($counts as $count){
            $cadastros = $count[0]['cadastros'];
            $dados .="['".$count[0]['periodo']."',$cadastros],";
        }
    ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Mês/Ano', 'Nº Cadastro'],
            <?=$dados?>
          ]);

          var options = {
            title: 'Candidatos Cadastrados por Mês',
            hAxis: {title: 'Mês/Ano', titleTextStyle: {color: 'red'}}
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

          chart.draw(data, options);

        }
    </script>
    <div align="center">
        <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </div>