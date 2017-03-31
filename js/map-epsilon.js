/*
* ADAF2016
* 69.numbers.suck marker map
* @author iheartmyart@browserbased.org
* @author awake@0324am.net
*/

/*global jQuery,$,L*/

var markerData = {
        "type": "FeatureCollection",
        "features": [


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1186'>6940601001 6945603800 Ntinos Renos epsilon masaz politics</a>",
					"icon": "n-m00"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7404416667, 37.9698833333]
			}
 },


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1192'>6940601001 Ntinos epsilon masaz politics</a>",
					"icon": "n-m01"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7403611111, 37.9698972222]
			}
 },


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1200'>69 epsilon</a>",
					"icon": "n-m03"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7395277778, 37.9704555556]
			}
 },


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1642'>6940601001 Manos epsilon frappe masaz</a>",
					"icon": "n-m04"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7238555556, 37.9839527778]
			}
 },


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1674'>epsilon girl politics</a>",
					"icon": "n-m05"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7217722222, 37.98515]
			}
 },


 {
		 "type": "Feature",
		 "properties": {
					"popupText": "<a href='/viewer.php?name=IMG_1675'>epsilon girl politics</a>",
					"icon": "n-m06"
     },
		 "geometry": {
					"type": "Point",
					"coordinates": [23.7217722222, 37.98515]
			}
 },



        ]
    };

jQuery(function () {
    "use strict";

    jQuery('#infomap').height(850);

    //l10n ;)
    if (jQuery('html').attr('lang') === 'en-US') {
        jQuery.each(markerData.features, function (i) {
            jQuery.extend(markerData.features[i].properties);
        });
    }

    var map = L.map('infomap').setView([37.999070000000, 23.716928333333335], 12),
        DropIcon = L.Icon.extend({
            options: {
                shadowUrl: './img/markerShadow.png',
                iconSize:     [25, 41],
                shadowSize:   [41, 41],
                iconAnchor:   [14, 40],
                shadowAnchor: [4, 62],
                popupAnchor:  [0, -45]
            }
        }),
        SquareIcon = L.Icon.extend({
            options: {
                shadowUrl: './img/markerShadow.png',
                iconSize:     [25, 25],
                shadowSize:   [41, 41],
                iconAnchor:   [14, 15],
                shadowAnchor: [10, 40],
                popupAnchor:  [0, -25]
            }
        });

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a style="color:#7FFF00" href="./reference-material/copyright.html" target="_blank">BrowserBased Group</a>,<br /> <a style="color:#7FFF00" href="http://osm.org/copyright" target="_blank">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.geoJson(markerData, {
        pointToLayer: function (feature, latlng) {
            return L.marker(latlng);
        },
        onEachFeature: function (feature, layer) {
            layer.bindPopup('</h3>' + feature.properties.popupText);
            if (feature.properties.icon.indexOf("Square") > -1) {
                layer.setIcon(new SquareIcon({iconUrl: './img/' + feature.properties.icon + '.gif'}));
            } else {
                layer.setIcon(new DropIcon({iconUrl: './img/' + feature.properties.icon + '.gif'}));
            }
        }
    }).addTo(map);

});
