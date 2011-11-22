<?php
//$atributo = 'pequenaprueba';
//$comando = '/var/www/skyline/conectarC/sfs1 ';
//./skyline 3 comida servicio distancia max max max 33.742612777346885 -84.385986328125 restaurantes_int_uso sinciudad 1
//./skyline 3 comida servicio decoracion max max max restaurantes_int_uso sinciudad 2


//PARAMETROS DEL COMANDO
$esc=' ';
$comando='/var/www/MapSkyline/codigo/skyline';
/*$num_dim='3';
$att1='comida';
$att2='servicio';
$att3='distancia';
$max1='max';
$max2='max';
$max3='max';
$latitud='33.742612777346885';
$longitud='-84.385986328125';
$tabla='restaurantes_int_uso';
$ciudad='Altlanta';
$algoritmo='1';*/

$num_dim='3';
$att1='comida';
$att2='servicio';
$att3='decoracion';
$max1='max';
$max2='min';
$max3='min';
//$latitud='33.742612777346885';
//$longitud='-84.385986328125';
$latitud=$_POST["latitud"];
$longitud=$_POST["longitud"];
$tabla= $_POST["tabla"];
$ciudad= $_POST["ciudad"];
$atributos= str_getcsv($_POST["atributos"]);
$min_max= str_getcsv($_POST["min_max"]);
$algoritmo=$_POST["algoritmo"];
$num_dim2= sizeof($atributos);

$parametros=$num_dim2.$esc;

foreach ($atributos as $i) {
    $parametros=$parametros.$i.$esc;
}
foreach ($min_max as $j) {
    $parametros=$parametros.$j.$esc;
}

//if(strcmp($latitud, '0')){
  //  $parametros = $parametros.$tabla.$esc.$ciudad.$esc.$algoritmo;
    
//}
//else{
    $parametros = $parametros.$latitud.$esc.$longitud.$esc.$tabla.$esc.$ciudad.$esc.$algoritmo;
//}


//$parametros=$num_dim.$esc.$att1.$esc.$att2.$esc.$att3.$esc.$max1.$esc.$max2.$esc.$max3.$esc.$latitud.$esc.$longitud.$esc.$tabla.$esc.$ciudad.$esc.$algoritmo;
//$parametros=$num_dim.$esc.$att1.$esc.$att2.$esc.$att3.$esc.$max1.$esc.$max2.$esc.$max3.$esc.$tabla.$esc.$ciudad.$esc.$algoritmo;


$final = $comando.$esc.$parametros;


exec($final,$out,$retval);

$i=0;
for($i=0; $i< count($out); $i++)
{
	$coma_fila[$i] = str_getcsv($out[$i],",");
}
/*
$i=0;
$j=0;

foreach($coma_fila as $row){
	echo($row[1]. '<br>');
	$i=$i+1;
}*/

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);	

header("Content-type: text/xml");


foreach($coma_fila as $row){
	$node = $dom->createElement("marker");  
	$newnode = $parnode->appendChild($node);   
	$newnode->setAttribute("nombre",$row[1]);
	$newnode->setAttribute("direccion", $row[2]);  
	$newnode->setAttribute("latitud", $row[3]);  
	$newnode->setAttribute("longitud", $row[4]);  
}


echo $dom->saveXML();

?>
