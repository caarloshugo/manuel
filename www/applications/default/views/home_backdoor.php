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
				<?php foreach($tweets["danger"] as $tweet) { ?>
					['<?php echo $tweet["image"];?>','<?php echo $tweet["text"];?>'],
				<?php } ?>
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
				<?php foreach($tweets["mochis"] as $tweet) { ?>
					['<?php echo $tweet["image"];?>','<?php echo $tweet["text"];?>'],
				<?php } ?>
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
				<?php foreach($tweets["culiacan"] as $tweet) { ?>
					['<?php echo $tweet["image"];?>','<?php echo $tweet["text"];?>'],
				<?php } ?>
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
				<?php foreach($tweets["lapaz"] as $tweet) { ?>
					['<?php echo $tweet["image"];?>','<?php echo $tweet["text"];?>'],
				<?php } ?>
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
