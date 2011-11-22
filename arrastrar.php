<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <body>
        <h2>Mapa de Prueba</h2>
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAuqDGGUbsEY-0a0IvUKCa5hS8o1oRf-6BNnXLXah42zTZYTJLwRTNFDfeApg2OqbdIvS3c2NrpqmNZg"
        type="text/javascript"></script>
        <script type="text/javascript">
            var mapa;

            var baseIcon = new GIcon();
            baseIcon.iconSize=new GSize(32,32);
            baseIcon.shadowSize=new GSize(56,32);
            baseIcon.iconAnchor=new GPoint(16,32);
            baseIcon.infoWindowAnchor=new GPoint(16,0);
		            
            var estrella = new GIcon(baseIcon, "http://maps.google.com/mapfiles/kml/pal4/icon47.png", null, "http://maps.google.com/mapfiles/kml/pal4/icon47s.png");


            function initialize() {
                if (GBrowserIsCompatible()) {
                    map = new GMap2(document.getElementById("map"));
                    map.setCenter(new GLatLng(48.85848935189384, 2.2945761680603027), 5);
                    map.enableContinuousZoom();
                    map.enableScrollWheelZoom();
                    map.enableGoogleBar();
                    map.setUIToDefault();

                }

            }

            function createMarker(point,html,icon) {
                var marker = new GMarker(point,{draggable:true});
                marker.icon = icon;
                GEvent.addListener(marker, "click", function() {
                    marker.openInfoWindowHtml(html);
                });
                GEvent.addListener(marker, "dragstart", function() { 
                    map.closeInfoWindow();
                });

                GEvent.addListener(marker,"dragend",function(){
                    document.getElementById("lat").value = marker.getLatLng().lat();
                    marker.openInfoWindow(html);
                });

                GEvent.addListener(marker,"dragend",function(){
                    document.getElementById("long").value = marker.getLatLng().lng();});

                GEvent.addListener(map,"move",function(){
                    document.getElementById("lat").value = marker.getLatLng().lat();});
                GEvent.addListener(map,"move",function(){
                    document.getElementById("long").value = marker.getLatLng().lng();});

                return marker;
            }


		

            function agregarPin(){
                var point = new GLatLng(48.85848935189384, 2.2945761680603027);
                var marker = createMarker(point,'<div style="width:240px">Un punto marcado :D<\/div>',estrella);
                map.addOverlay(marker);
							
            }

		
        </script>
        <body onload="initialize()" onunload="GUnload()">
            <div id="map" style="width: 1100px; height: 550px"></div>

            <form>
                <input name="agregar" type="button" value="Agregar una Marca"  onclick="agregarPin(); return false"/>
                <label for="lat"> Latitud : </label>
                <input type= "text" id="lat" value="0" name="lat"/>
                <label for="long"> Longitud : </label>
                <input type="text" id="long" value="0" name="long"/>
            </form>
        </body>
