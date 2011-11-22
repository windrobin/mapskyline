//COSAS DEL MAPA
var iconBlue = new GIcon(); 
iconBlue.image = 'http://labs.google.com/ridefinder/images/mm_20_blue.png';
iconBlue.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconBlue.iconSize = new GSize(12, 20);
iconBlue.shadowSize = new GSize(22, 20);
iconBlue.iconAnchor = new GPoint(6, 20);
iconBlue.infoWindowAnchor = new GPoint(5, 1);

var iconRed = new GIcon(); 
iconRed.image = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
iconRed.shadow = 'http://labs.google.com/ridefinder/images/mm_20_shadow.png';
iconRed.iconSize = new GSize(12, 20);
iconRed.shadowSize = new GSize(22, 20);
iconRed.iconAnchor = new GPoint(6, 20);
iconRed.infoWindowAnchor = new GPoint(5, 1);

var customIcons = [];
customIcons["restaurant"] = iconBlue;
customIcons["bar"] = iconRed;
    
    
var map; //Variable map global para modificar cuando yo quiera

function load() {
    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(33.7426, -84.386), 13);

    // Change this depending on the name of your PHP file
		    
    }
}


