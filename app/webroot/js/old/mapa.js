var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-19.939596, -43.941742);
	
    var options = {
        zoom: 5,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

