jQuery( function( $ ) {
    "use strict";

    if(typeof map_attr != 'undefined') {

        var locations = [
            {
                lat: map_attr.lat,
                lon: map_attr.lang,
                title: 'Locations',
                html: map_attr.address,
                icon: map_attr.icon,
                animation: google.maps.Animation.DROP
            },
        ]

        var homePageZoom = map_attr.zoom ? parseInt(map_attr.zoom) : 8;
        var styles = [

                        {"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},
                        {"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},
                        {"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},
                        {"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},
                        {"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},
                        {"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},
                        {"featureType":"administrative.province","stylers":[{"visibility":"off"}]},
                        {"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},
                        {"lightness":-25},{"saturation":-100}]},
                        {"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}
                    ]

        new Maplace({
            map_div: '#map',
            locations: locations,
            start: 1,
            map_options: {
                navigationControl: false,

                scrollwheel: false,
                zoom: homePageZoom
            },
            styles: {

                    'Night': [
                    {
                        featureType: 'all',
                        stylers: [{ invert_lightness: 'true' }]
                    }
                ],
                'Greyscale':  styles
            }

        }).Load();
    }
});
