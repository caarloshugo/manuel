<script src='//api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.js'></script>
<script src='http://codeorigin.jquery.com/jquery-2.0.3.min.js'></script>
<link href='//api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.css' rel='stylesheet' />
<!--[if lte IE 8]>
<link href='//api.tiles.mapbox.com/mapbox.js/v1.3.1/mapbox.ie.css' rel='stylesheet'>
<![endif]-->
<style>
body { margin:0; padding:0; }
#map { position:absolute; top:0; bottom:0; width:100%; }
</style>

<style>
.popup {
    text-align: center;
}
.popup .slideshow {
    width: 100%;
}
.popup .slideshow .image {
    display: none;
}
.popup .slideshow .active {
    display: block;
}
.popup .slideshow img {
    width: 100%;
}
.popup .slideshow .caption {
    background: #eee;
    padding: 8px;
}
.popup .cycle {
    height: 30px;
    margin-top: 5px;
    padding-top: 5px;
}
.popup .cycle a.prev {
    float: left;
}
.popup .cycle a.next {
    float: right;
}
</style>

<div id='map'></div>

<script type='text/javascript'>
var map = L.mapbox.map('map', 'caarloshugo.map-yxf4whgl');


var geoJson = [
	{
		type: 'Feature',
		"geometry": { "type": "Point", "coordinates": [-108.19335937499999, 25.175116531621764]},
		"properties": {
			'title': 'Zona de alerta',

			// Store the image url and caption in an array
			'images': [
									['http://pbs.twimg.com/media/BUgKQJQCEAIzcWJ.jpg','@webcamsdemexico: @chaac_tlaloc: imagen d #Manuel sobre el sur del GolfoDeCalifornia y norte d Sinaloa http://t.co/2OgUWrvJnQ'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','@webcamsdemexico:Huracán #Manuel a poco d tocarTierra. MáximaAlerta e/LaCruz,Sinaloa y Huatabampito,Sonora.MapaActual http://t.co/PncmRwU7PY'],
									['http://pbs.twimg.com/media/BUf2lKSCcAAH2Q2.jpg','#MANUEL GENERA LLUVIAS TORRENCIALES EN SINALOA, Y FUERTES EN NAYARIT, BCS Y SUR DE SONORA http://t.co/ec5tgdcMIr'],
									['','RT @marynogales: Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/e…'],
									['http://pbs.twimg.com/media/BUfi0bbCYAEnvto.jpg','Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/eZ38Azs71x'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','RT @RICMIBU: "@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/A8wDzRGzNJ"'],
									['http://pbs.twimg.com/media/BUfd9NeCIAA47D9.jpg','#Huracán #Manuel perdona a #BCS y se enfila a #Sinaloa. Persisten lluvias torrenciales principalmente en #LosCabos http://t.co/BNhOXqBwPa'],
									['http://pbs.twimg.com/media/BUfdRYLCQAATZve.jpg','Aqui #Manuel en #LaPaz se hace presente @climaloscabos @conaguabcs http://t.co/oi7102VLyz'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','RT @RICMIBU: "@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/A8wDzRGzNJ"'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','"@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/A8wDzRGzNJ"'],
									['http://pbs.twimg.com/media/BUeqKDKCcAAmJE9.jpg','"@ObservatorioPRI: “@David_Korenfeld: Localización y trayectoria de #Manuel, incluyendo su cono de incertidumbre http://t.co/554s1mWQlg”"'],
									['http://pbs.twimg.com/media/BUe8syUCMAAHnsq.jpg','RT “@gabomtzr: #Manuel en San Jose del Cabo @metmex @climaloscabos http://t.co/Deqo946c2N”'],
									['http://pbs.twimg.com/media/BUeiCxWCUAAdLRc.jpg','RT @Ymly: Aguacero en Puerto Los Cabos en este momento #Manuel @climaloscabos http://t.co/dQtwrcGoBv'],
									['http://pbs.twimg.com/media/BUer8mTCIAExRuL.jpg','#manuel llegó con ganas... A san josé del Cabo... Y eso que esta a kilómetro... Va a estar bueno el chow. :-( http://t.co/Zq43T2SP7G'],
									['http://pbs.twimg.com/media/BUeryPJCMAEx_Py.jpg','En estos momentos las primeras lluvias de #manuel en san josé del Cabo #Paceños  va a estar bueno http://t.co/znQH4HmxWu'],
							]
		}
	},
	{
		type: 'Feature',
		"geometry": { "type": "Point", "coordinates": [-108.99261474609375, 25.79309078253729]},
		"properties": {
			'title': 'Los Mochis',

			// Store the image url and caption in an array
			'images': [
									['http://pbs.twimg.com/media/BUf1Y-iCQAAKuxt.jpg','RT @Noticierista: Así ve a huracán #Manuel el Centro de Huracanes de Miami @linea_directa http://t.co/3Qi7y0YQEF'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','"Huracán #Manuel a poco de tocar tierra. Máxima alerta entre La Cruz #Sinaloa y Huatabampito, #Sonora. Mapa actual http://t.co/MLzfTtKgbO"'],
									['','RT @ELDEBATE: Checa algunas impresionantes fotografías del paso de #Manuel por el puerto de #Mazatlán http://t.co/qkLbr0qRo1 http://t.co/qj…'],
									['','RT @ELDEBATE: Checa algunas impresionantes fotografías del paso de #Manuel por el puerto de #Mazatlán http://t.co/qkLbr0qRo1 http://t.co/qj…'],
									['http://pbs.twimg.com/media/BUf93JoCMAAYJWC.jpg','Shared from NOAA Now #Hurricane #Manuel forecast http://t.co/lFcDDf5IQG'],
									['http://pbs.twimg.com/media/BUf9AxRCEAAQoCa.jpg','Shared from NOAA Now #Hurricane #Manuel http://t.co/n6MOonlrfy'],
									['','RT @ELDEBATE: Checa algunas impresionantes fotografías del paso de #Manuel por el puerto de #Mazatlán http://t.co/qkLbr0qRo1 http://t.co/qj…'],
									['http://pbs.twimg.com/media/BUf1Y-iCQAAKuxt.jpg','RT @Noticierista: Así ve a huracán #Manuel el Centro de Huracanes de Miami @linea_directa http://t.co/3Qi7y0YQEF'],
									['http://pbs.twimg.com/media/BUf4sBBCEAA7KM8.jpg','#Manuel #CaneCast http://t.co/r3oQlD6O4I'],
									['http://pbs.twimg.com/media/BUf3snLCEAAsn5Q.jpg','Aaaaaaay mamita!!!! #manuel http://t.co/B0Rt13ZmSw'],
									['http://pbs.twimg.com/media/BUf1Y-iCQAAKuxt.jpg','RT @Noticierista: Así ve a huracán #Manuel el Centro de Huracanes de Miami @linea_directa http://t.co/3Qi7y0YQEF'],
									['http://pbs.twimg.com/media/BUf0HPvCMAAkfiN.jpg','RT @Noticierista: Zona de alerta por huracán #Manuel de La Cruz a Topolobampo #Sinaloa según CONAGUA @linea_directa http://t.co/9CkhOn2CFp'],
									['http://pbs.twimg.com/media/BUf12e7CQAELyf1.jpg','@iauraB en Sinaloa estamos ansiosos esperando a #Manuel http://t.co/dWhjtzO2I0'],
									['http://pbs.twimg.com/media/BUf1Y-iCQAAKuxt.jpg','Así ve a huracán #Manuel el Centro de Huracanes de Miami @linea_directa http://t.co/3Qi7y0YQEF'],
									['http://pbs.twimg.com/media/BUf0HPvCMAAkfiN.jpg','RT @Noticierista: Zona de alerta por huracán #Manuel de La Cruz a Topolobampo #Sinaloa según CONAGUA @linea_directa http://t.co/9CkhOn2CFp'],
							]
		}
	},
	{
		type: 'Feature',
		"geometry": { "type": "Point", "coordinates": [-107.39479064941406, 24.802318262910543]},
		"properties": {
			'title': 'Culiacan',

			// Store the image url and caption in an array
			'images': [
									['http://pbs.twimg.com/media/BUgKQJQCEAIzcWJ.jpg','@webcamsdemexico: @chaac_tlaloc: imagen d #Manuel sobre el sur del GolfoDeCalifornia y norte d Sinaloa http://t.co/2OgUWrvJnQ'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','"Huracán #Manuel a poco de tocar tierra. Máxima alerta entre La Cruz #Sinaloa y Huatabampito, #Sonora. Mapa actual http://t.co/MLzfTtKgbO"'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','@webcamsdemexico:Huracán #Manuel a poco d tocarTierra. MáximaAlerta e/LaCruz,Sinaloa y Huatabampito,Sonora.MapaActual http://t.co/PncmRwU7PY'],
									['http://pbs.twimg.com/media/BUf4sBBCEAA7KM8.jpg','#Manuel #CaneCast http://t.co/r3oQlD6O4I'],
									['http://pbs.twimg.com/media/BUf12e7CQAELyf1.jpg','@iauraB en Sinaloa estamos ansiosos esperando a #Manuel http://t.co/dWhjtzO2I0'],
									['http://pbs.twimg.com/media/BUfpZ0WCcAAzohp.jpg','RT @Pityjui: Ultimas proyecciones situan a #Manuel a 10 kms de Altata a las 9:00 pm. #Sinaloa http://t.co/lgfEcn8gbY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','RT @ramsesrrangel: #manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','RT @ramsesrrangel: #manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','#manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfpZ0WCcAAzohp.jpg','Ultimas proyecciones situan a #Manuel a 10 kms de Altata a las 9:00 pm. #Sinaloa http://t.co/lgfEcn8gbY'],
									['','RT @marynogales: Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/e…'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','"@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/bVvuouTGYw"'],
									['http://pbs.twimg.com/media/BUfi0bbCYAEnvto.jpg','Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/eZ38Azs71x'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','RT @RICMIBU: "@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/A8wDzRGzNJ"'],
									['http://pbs.twimg.com/media/BUfdRYLCQAATZve.jpg','Aqui #Manuel en #LaPaz se hace presente @climaloscabos @conaguabcs http://t.co/oi7102VLyz'],
							]
		}
	},
	{
		type: 'Feature',
		"geometry": { "type": "Point", "coordinates": [-110.31166076660156, 24.141740980504334]},
		"properties": {
			'title': 'La Paz',

			// Store the image url and caption in an array
			'images': [
									['http://pbs.twimg.com/media/BUgKQJQCEAIzcWJ.jpg','@webcamsdemexico: @chaac_tlaloc: imagen d #Manuel sobre el sur del GolfoDeCalifornia y norte d Sinaloa http://t.co/2OgUWrvJnQ'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','"Huracán #Manuel a poco de tocar tierra. Máxima alerta entre La Cruz #Sinaloa y Huatabampito, #Sonora. Mapa actual http://t.co/MLzfTtKgbO"'],
									['http://pbs.twimg.com/media/BUgE8FHCYAAf4U9.jpg','@webcamsdemexico:Huracán #Manuel a poco d tocarTierra. MáximaAlerta e/LaCruz,Sinaloa y Huatabampito,Sonora.MapaActual http://t.co/PncmRwU7PY'],
									['http://pbs.twimg.com/media/BUf4sBBCEAA7KM8.jpg','#Manuel #CaneCast http://t.co/r3oQlD6O4I'],
									['http://pbs.twimg.com/media/BUf2lKSCcAAH2Q2.jpg','#MANUEL GENERA LLUVIAS TORRENCIALES EN SINALOA, Y FUERTES EN NAYARIT, BCS Y SUR DE SONORA http://t.co/ec5tgdcMIr'],
									['http://pbs.twimg.com/media/BUf12e7CQAELyf1.jpg','@iauraB en Sinaloa estamos ansiosos esperando a #Manuel http://t.co/dWhjtzO2I0'],
									['http://pbs.twimg.com/media/BUfpZ0WCcAAzohp.jpg','RT @Pityjui: Ultimas proyecciones situan a #Manuel a 10 kms de Altata a las 9:00 pm. #Sinaloa http://t.co/lgfEcn8gbY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','RT @ramsesrrangel: #manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','RT @ramsesrrangel: #manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfrcO4CUAE6JoK.jpg','#manuel on http://t.co/Ck93Q8LupY'],
									['http://pbs.twimg.com/media/BUfpZ0WCcAAzohp.jpg','Ultimas proyecciones situan a #Manuel a 10 kms de Altata a las 9:00 pm. #Sinaloa http://t.co/lgfEcn8gbY'],
									['','RT @marynogales: Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/e…'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','"@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/bVvuouTGYw"'],
									['http://pbs.twimg.com/media/BUfi0bbCYAEnvto.jpg','Lluvia en #LaPaz #BCS por efectos del #Huracán #Manuel, no hay vientos. Se anunció que enfila para #Sinaloa. http://t.co/eZ38Azs71x'],
									['http://pbs.twimg.com/media/BUfTiLZCYAIgnOR.jpg','RT @RICMIBU: "@PcSegob: El #Huracán #Manuel Categoría 1 se localiza a 30 km al suroeste de Altata, Sinaloa. http://t.co/A8wDzRGzNJ"'],
							]
		}
	}
];

// Add custom popup html to each marker
map.markerLayer.on('layeradd', function(e) {
    var marker = e.layer;
    var feature = marker.feature;
    var images = feature.properties.images
    var slideshowContent = '';

    for(var i = 0; i < images.length; i++) {
        var img = images[i];

        slideshowContent += '<div class="image' + (i === 0 ? ' active' : '') + '">' +
                              '<img src="' + img[0] + '" />' +
                              '<div class="caption">' + img[1] + '</div>' +
                            '</div>';
    }

    // Create custom popup content
    var popupContent =  '<div id="' + feature.properties.id + '" class="popup">' +
                            '<h2>' + feature.properties.title + '</h2>' +
                            '<div class="slideshow">' +
                                slideshowContent +
                            '</div>' +
                            '<div class="cycle">' +
                                '<a href="#" class="prev" onclick="return moveSlide(\'prev\')">&laquo; Previous</a>' +
                                '<a href="#" class="next" onclick="return moveSlide(\'next\')">Next &raquo;</a>' +
                            '</div>'
                        '</div>';

    // http://leafletjs.com/reference.html#popup
    marker.bindPopup(popupContent,{
        closeButton: false,
        minWidth: 320
    });
});

// Add features to the map
map.markerLayer.setGeoJSON(geoJson);

// This example uses jQuery to make selecting items in the slideshow easier.
// Download it from http://jquery.com
function moveSlide(direction) {
    var $slideshow = $('.slideshow'),
        totalSlides = $slideshow.children().length;

    if (direction === 'prev') {
        var $newSlide = $slideshow.find('.active').prev();
        if ($newSlide.index() < 0) {
            $newSlide = $('.image').last();
        }
    } else {
        var $newSlide = $slideshow.find('.active').next();
        if ($newSlide.index() < 0) {
            $newSlide = $('.image').first();
        }
    }

    $slideshow.find('.active').removeClass('active').hide();
    $newSlide.addClass('active').show();
    return false;
}

map.setView([27.936, -109.940], 6);
</script>
