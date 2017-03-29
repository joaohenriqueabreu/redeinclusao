<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Google Maps API v3: Criando um mapa personalizado</title>
        <link rel="stylesheet" type="text/css" href="<?=$this->base?>/css/maps.css">
    </head>

    <body>
        <style>
            #mapa{
              border: #6e694d solid 3px;
              border-radius: 5px;
              margin: 10px 0 0 0
            }
        </style>

    	<div id="mapa" style="height: 700px; width: 950px"></div>

        <?php
          echo $this->Html->script('jquerymaps.min');
        ?>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <?php
          echo $this->Html->script('infobox');
          echo $this->Html->script('markerclusterer');
          echo $this->Html->script('mapa');
          echo $this->fetch('meta');
          echo $this->fetch('css');
          echo $this->fetch('script');
          echo $this->fetch('content');
        ?>
        <script>
            function carregarPontos() {
                parent.$('#carregando').show();
                $.getJSON('<?=isset($this->params['pass'][1]) ? $this->base.'/Vagas/maps_pontos/'.$this->params['pass'][0].'/'.$this->params['pass'][1] : $this->base.'/Vagas/maps_pontos/'.$this->params['pass'][0] ?>', function(pontos) {
            		var latlngbounds = new google.maps.LatLngBounds();

            		$.each(pontos, function(index, ponto) {
                       if(ponto.Tipo == 1){
                			var marker = new google.maps.Marker({
                				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                				title: '',
                                map: map
                			});
                       }else{
                			var marker = new google.maps.Marker({
                				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                				title: '',
                                icon: '<?=$this->base?>/img/Map-Azure.png',    
                                map: map
                			});
                       }
            			var myOptions = {
            				content: "<p>" + ponto.Descricao + "</p>",
            				pixelOffset: new google.maps.Size(-150, 0)
                    	};

            			infoBox[ponto.Id] = new InfoBox(myOptions);
            			infoBox[ponto.Id].marker = marker;

            			infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
            				abrirInfoBox(ponto.Id, marker);
            			});

            			//markers.push(marker);

            			latlngbounds.extend(marker.position);

            		});

            	   	//var markerCluster = new MarkerClusterer(map, markers);

            		map.fitBounds(latlngbounds);
                    parent.$('#carregando').hide();
            	});

            }
            carregarPontos();
        </script>
    </body>
</html>