<?php
    echo $this->Html->script('http://maps.google.com/maps/api/js?v=3.3&sensor=true&language=pt-BR&libraries=places', array('block'=>'customArchives'));
    echo $this->Html->script('http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAAVn9yk4_6mMDfOH0rTYvFmRR4AWy-DkBletawZg-yLMeKW6ooTBT0OU612EZd--JvWKOf2497ZqTYuQ', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>

        var directionDisplay;
        var directionsService = new google.maps.DirectionsService();
        var FinalLocation;
        var browserSupportFlag = new Boolean();
        var IsGeo = new Boolean();
        var map;
        var marker;
        var start;
        var end;
        // Our global state
        var gLocalSearch;
        var gInfoWindow;
        var gSelectedResults = [];
        var gCurrentResults = [];
        var gSearchForm;
        var service;
        var valorselect;

        // Create our "tiny" marker icon
        var gYellowIcon = new google.maps.MarkerImage(
        "http://labs.google.com/ridefinder/images/mm_20_yellow.png",
        new google.maps.Size(12, 20),
        new google.maps.Point(0, 0),
        new google.maps.Point(6, 20));
          var gRedIcon = new google.maps.MarkerImage(
        "http://labs.google.com/ridefinder/images/mm_20_red.png",
        new google.maps.Size(12, 20),
        new google.maps.Point(0, 0),
        new google.maps.Point(6, 20));
          var gSmallShadow = new google.maps.MarkerImage(
        "http://labs.google.com/ridefinder/images/mm_20_shadow.png",
        new google.maps.Size(22, 20),
        new google.maps.Point(0, 0),
        new google.maps.Point(6, 20));

        var iconCandidatoCadastrado = new google.maps.MarkerImage(
            "http://redeinclusao.org.br/v2/img/Map-Azure32x32.png",
            new google.maps.Size(32, 32),
            new google.maps.Point(0, 0),
            new google.maps.Point(6, 20));

        var iconCandidatoContratado = new google.maps.MarkerImage(
            "http://redeinclusao.org.br/v2/img/Map-Verdure.png",
            new google.maps.Size(64, 64),
            new google.maps.Point(0, 0),
            new google.maps.Point(6, 20));

        var iconClientesEfetivados = new google.maps.MarkerImage(
            "http://redeinclusao.org.br/v2/img/Map-Preture.png",
            new google.maps.Size(64, 64),
            new google.maps.Point(0, 0),
            new google.maps.Point(6, 20));

        var pontos = <?=json_encode($geocode)?>;

        function initialize() {
            IsGeo = false;
            directionsDisplay = new google.maps.DirectionsRenderer();
            var myOptions = {
                scrollwheel: false,
                zoom: 12,
                mapTypeControl: true,
                mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR },
                navigationControl: true,
                navigationControlOptions: { style: google.maps.NavigationControlStyle.DEFAULT },
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: initialLocation
            };

            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById("directionsPanel"));

            //marcação de empresa no mapa
            gInfoWindow = new google.maps.InfoWindow;
            google.maps.event.addListener(gInfoWindow, 'closeclick', function () {
                //unselectMarkers();
            });

            // Initialize the local searcher
            gLocalSearch = new GlocalSearch();
            gLocalSearch.setSearchCompleteCallback(null, OnLocalSearch);

            var iconlogo = new google.maps.MarkerImage(
                    "http://redeinclusao.org.br/v2/img/iconeEster.png",
                     new google.maps.Size(45, 52),
                     new google.maps.Point(0, 0),
                     new google.maps.Point(0, 25)
                );

            marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                title: 'Institudo Ester Assumpção',
                icon: iconlogo
            });

            $.each(pontos, function(index, ponto) {
               createMarker(ponto);
            });

        }

        function createMarker(ponto) {
            var icon;
            if(ponto.Tipo == 1){
              icon = iconCandidatoCadastrado;
            }else if(ponto.Tipo == 0){
              icon = iconClientesEfetivados;
            }else if(ponto.Tipo == 2){
              icon = iconCandidatoContratado;
            }
            var marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
                icon: icon
            });
            var infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(ponto.Descricao);
                infowindow.open(map, this);
            });
        }

        // Called when Local Search results are returned, we clear the old
        // results and load the new ones.
        function OnLocalSearch() {
            if (!gLocalSearch.results) return;
            var searchWell = document.getElementById("placesPanel");

            // Clear the map and the old search well
            searchWell.innerHTML = "";
            for (var i = 0; i < gCurrentResults.length; i++) {
                gCurrentResults[i].marker().setMap(null);
            }
            // Close the infowindow
            gInfoWindow.close();

            gCurrentResults = [];
            for (var i = 0; i < gLocalSearch.results.length; i++) {
                gCurrentResults.push(new LocalResult(gLocalSearch.results[i]));
            }

            var attribution = gLocalSearch.getAttribution();
            if (attribution) {
                // document.getElementById("directionsPanel").appendChild(attribution);
            }

            // Move the map to the first result
            var first = gLocalSearch.results[0];
            map.setCenter(new google.maps.LatLng(parseFloat(first.lat),
                parseFloat(first.lng)));

        }

        // Cancel the form submission, executing an AJAX Search API search.
        function CaptureForm(searchForm) {
            gLocalSearch.execute(searchForm.input.value);
            return false;
        }

        // A class representing a single Local Search result returned by the
        // Google AJAX Search API.
        function LocalResult(result) {
            var me = this;
            me.result_ = result;
            me.resultNode_ = me.node();
            me.marker_ = me.marker();
            google.maps.event.addDomListener(me.resultNode_, 'mouseover', function () {
                // Highlight the marker and result icon when the result is
                // mouseovered.  Do not remove any other highlighting at this time.
                me.highlight(true);
            });
            google.maps.event.addDomListener(me.resultNode_, 'mouseout', function () {
                // Remove highlighting unless this marker is selected (the info
                // window is open).
                if (!me.selected_) me.highlight(false);
            });
            google.maps.event.addDomListener(me.resultNode_, 'click', function () {
                me.select();
            });
            document.getElementById("placesPanel").appendChild(me.resultNode_);
        }

        LocalResult.prototype.node = function () {
            if (this.resultNode_) return this.resultNode_;
            return this.html();
        };

        // Returns the GMap marker for this result, creating it with the given
        // icon if it has not already been created.
        LocalResult.prototype.marker = function () {
            var me = this;
            if (me.marker_) return me.marker_;
            var marker = me.marker_ = new google.maps.Marker({
                position: new google.maps.LatLng(parseFloat(me.result_.lat),
                                         parseFloat(me.result_.lng)),
                icon: gYellowIcon, shadow: gSmallShadow, map: map
            });
            google.maps.event.addListener(marker, "click", function () {
                me.select();
            });
            return marker;
        };

        // Unselect any selected markers and then highlight this result and
        // display the info window on it.
        LocalResult.prototype.select = function () {
            unselectMarkers();
            this.selected_ = true;
            this.highlight(true);
            gInfoWindow.setContent(this.html(true));
            gInfoWindow.open(map, this.marker());
        };

        LocalResult.prototype.isSelected = function () {
            return this.selected_;
        };

        // Remove any highlighting on this result.
        LocalResult.prototype.unselect = function () {
            this.selected_ = false;
            this.highlight(false);
        };

        // Returns the HTML we display for a result before it has been "saved"
        LocalResult.prototype.html = function () {
            var me = this;
            var container = document.createElement("div");
            container.className = "unselected";
            container.appendChild(me.result_.html.cloneNode(true));
            return container;
        }

        LocalResult.prototype.highlight = function (highlight) {
            this.marker().setOptions({ icon: highlight ? gRedIcon : gYellowIcon });
            this.node().className = "unselected" + (highlight ? " red" : "");
        }

        var initialLocation = new google.maps.LatLng(-19.969395, -44.203452);
        initialize();
<?php echo $this->Html->scriptEnd(); ?>
        <div class="row no-gutter" style="height: 100%; padding-top: 10px">
            <div class="col-md-12 col-sm-6 col-sx-6" style="height: 100%;">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-heading">
                        <h4>Georreferenciamento</h4>
    				    <ul class="links">
                            <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar</a>'), '/', array('escape' => false)); ?> </li>
    					</ul>
  			        </div>
                    <div class="panel-body" style="height: 95%;">
                        <div id="map-canvas" style="border: 1px solid #ccc; padding: 1px; width: 100%; height: 75%;"></div>
                    </div>
                </div>
            </div>
        </div>
