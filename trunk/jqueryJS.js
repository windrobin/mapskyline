/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//TODO LO QUE HAGA LUEGO DE QUE SE CARGA EL DOCUMENTO!!!!!

//Variables Globales
var mapa;
var centro;
var num_att;
var atributos;
var min_max;
var algoritmo;
var ciudad_marca;
var latitud=0;
var longitud=0;
var centroAltanta = new GLatLng(33.7426, -84.386);
var centroBoston = new GLatLng(42.35854391749705, -71.05948448181152);
var side_bar_html = "";
var gmarkers = [];
var htmls = [];
var i = 0;


var icon = new GIcon();
icon.image = "images/estrella.png";
icon.shadow = "images/estrellasombra.png";
icon.iconSize = new GSize(32, 32);
icon.shadowSize = new GSize(56, 32);
icon.iconAnchor = new GPoint(16, 32);
icon.infoWindowAnchor = new GPoint(16, 0);

//Funciones
function correrConsulta(ciudad,tabla,atributos,min_max,latitud2,longitud2){ 
    GDownloadUrl("crear_XML.php", function(data) {
				    
        var xml = GXml.parse(data);
        var markers = xml.documentElement.getElementsByTagName("marker");
				    
        for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("nombre");
            var address = markers[i].getAttribute("direccion");
            var point = new GLatLng(parseFloat(markers[i].getAttribute("latitud")),
                parseFloat(markers[i].getAttribute("longitud")));
            var marker = createMarker(point, name, address);
            mapa.addOverlay(marker);
        }
        document.getElementById("marcadores").innerHTML = side_bar_html; //Hacerlo con jquery
        $("#marcadores").show();
        $("#boton_marcadores").show();
        $("#controles").hide();
    }, "tabla="+tabla+"&ciudad="+ciudad+"&atributos="+atributos+"&min_max="+min_max+"&algoritmo="+algoritmo+"&latitud="+latitud2+"&longitud="+longitud2);
    
}
function createMarker(point, name, address) {
    var marker = new GMarker(point);
    var html = "<b>" + name + "</b> <br/>" + address;
    GEvent.addListener(marker, 'click', function() {
        marker.openInfoWindowHtml(html);
    });
    gmarkers[i] = marker;
    htmls[i] = html;
    side_bar_html += '<a href="javascript:myclick(' + i + ')">' + name + '<\/a><br>';
    i++;
    return marker;
}

function myclick(i) {
    gmarkers[i].openInfoWindowHtml(htmls[i]);
}

//MARCADOR ARRASTRABLE
function createMarker_drag(point,html) {
    var marker_drag = new GMarker(point,{
        draggable:true,
        icon:icon
    });
    
    GEvent.addListener(marker_drag, "click", function() {
        marker_drag.openInfoWindowHtml(html);
    });
    GEvent.addListener(marker_drag, "dragstart", function() {
        mapa.closeInfoWindow();
    });

    GEvent.addListener(marker_drag,"dragend",function(){
        document.getElementById("lat").value = marker_drag.getLatLng().lat();
        latitud=marker_drag.getLatLng().lat();
        marker_drag.openInfoWindow(html);
    });

    GEvent.addListener(marker_drag,"dragend",function(){
        document.getElementById("long").value = marker_drag.getLatLng().lng();
        longitud=marker_drag.getLatLng().lng();
    });

    GEvent.addListener(mapa,"move",function(){
        document.getElementById("lat").value = marker_drag.getLatLng().lat();
    });
    GEvent.addListener(mapa,"move",function(){
        document.getElementById("long").value = marker_drag.getLatLng().lng();
    });

    return marker_drag;
}


		

function agregarPin(ciudad_marca){
    var point = new GLatLng(33.7426, -84.386);
    var marker_drag1;
    
    mapa.clearOverlays(); //Borrar todos los marcadores que existen
    
    if(ciudad_marca=='Altlanta'){
        marker_drag1 = createMarker_drag(centroAltanta,'<div style="width:240px">Punto de referencia</div>');
    }
    else{
        marker_drag1 = createMarker_drag(centroBoston,'<div style="width:240px">Punto de referencia</div>');
    }

    mapa.addOverlay(marker_drag1);
							
}

//FIN MARCADOR ARRASTRABLE

//Conseguir los checkboxes
jQuery.fn.getCheckboxValues = function(){
    var values = [];
    var i = 0;
    this.each(function(){
        values[i++] = $(this).val();
    });
    return values;
}

//Deschekear los checkboxes


//Carga del Documento
$(document).ready(function () {
    $("#consulta").button();
    $("#marcar").button();
    $("#nueva_consulta").button();
    
    $("#ciudad").wijdropdown(
    {
        showingAnimation: {
            effect: "blind"
        },
        hidingAnimation: {
            effect: "blind"
        }
    }
    );
    $("#tabla").wijdropdown(
    {
        showingAnimation: {
            effect: "blind"
        },
        hidingAnimation: {
            effect: "blind"
        }
    }
    );
    
    $("#tabla").change(function(){
        var valorTablaCombo= $('#tabla option:selected').val();
        alert(valorTablaCombo);
        if(valorTablaCombo=='hoteles_int'){
            $("#atributos_hot").show();
        }
        else{
            $("#atributos_rest").show();
        }
    });
    
    $("#ciudad").change(function(){
        ciudad_marca = $('#ciudad option:selected').val();
        
    });
    
    $("#marcar").click(function(event){
        agregarPin(ciudad_marca);        
    });
    
    $("#nueva_consulta").click(function(event){ //Ejecutar la Consulta
        $("#marcadores").hide();
        $("#boton_marcadores").hide();
        $("#controles").show();
        //mapa.clearOverlays(); //Borrar todos los marcadores que existen
        //mapa.setCenter(new GLatLng(38.54816542304656,-99.84375), 4);
    //Resetear Combo box
    $("#marcadores input[type='checkbox']").each(function(){
        this.removeAttr("checked"); 
    });
    //Ocultar todas las barras de atributos
    //resetear los checkbox

    //resetear los radio boton
    });
    
    $("#consulta").click(function(event){ //Ejecutar la Consulta
        mapa.clearOverlays(); //Borrar todos los marcadores que existen
        var valorCiudad = $('#ciudad option:selected').val();
        var valorTabla= $('#tabla option:selected').val();
          
        if(valorCiudad=='Atlanta'){
            mapa.setCenter(centroAltanta,8);
        }
        else if(valorCiudad=='Boston'){
            mapa.setCenter(centroBoston,8);
        }
        else{
            mapa.setCenter(centroAltanta,8);
        }
        
        //COLOCARLO SEGUN TABLAAAAA Si es restaurantes ---> atributos_rest ---> el DIV correspondiente
        
        if(valorTabla=='hoteles_int'){
            atributos = $("#atributos_hot input[type='checkbox']:checked").getCheckboxValues();
            min_max = $("#atributos_hot input[type='radio']:checked").getCheckboxValues();
        }
        else{
            atributos = $("#atributos_rest input[type='checkbox']:checked").getCheckboxValues();
            min_max = $("#atributos_rest input[type='radio']:checked").getCheckboxValues();
        }
       
        algoritmo = $("#algoritmo input[type='radio']:checked").getCheckboxValues();
          
        correrConsulta(valorCiudad,valorTabla,atributos,min_max,algoritmo,latitud,longitud);
    
    });
    
    
    //Cargar el Mapa    
    
    centro = new GLatLng(0,0)
    
    if (GBrowserIsCompatible()) {
        mapa = new GMap2(document.getElementById("mapa"));
        mapa.setCenter(new GLatLng(38.54816542304656,-99.84375), 4);
        mapa.enableContinuousZoom();
        mapa.enableScrollWheelZoom();
        mapa.enableGoogleBar();
        mapa.setUIToDefault();
    }


});

