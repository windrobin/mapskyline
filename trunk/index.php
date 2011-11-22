<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MapSkyline</title>
       <!-- <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAR0TWf73rulOP_SnETQPFKxRj5djmSsmVAgDaRb1psFcJlThRhxSjxifqM96NjrBsBn2XrZWSE-QQqQ" type="text/javascript"></script> -->
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAuqDGGUbsEY-0a0IvUKCa5hSQ2LGMaMMg3JBKcyNMryVghzol7hSS_3a3bYslfYGqszO5YK8DXWaaUw" type="text/javascript"></script>
        

        <script src=jquery-1.6.4.js type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.5.1.min.js" type="text/javascript"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.11/jquery-ui.min.js" type="text/javascript"></script>
        <script src="http://cdn.wijmo.com/external/jquery.bgiframe-2.1.3-pre.js" type="text/javascript"></script>
        <script src="http://cdn.wijmo.com/external/jquery.glob.min.js" type="text/javascript"></script>
        <script src="http://cdn.wijmo.com/external/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="http://cdn.wijmo.com/external/raphael-min.js" type="text/javascript"></script>
        <script src="http://cdn.wijmo.com/jquery.wijmo-open.1.1.6.min.js" type="text/javascript"></script>
        <link href="http://cdn.wijmo.com/themes/aristo/jquery-wijmo.css" rel="stylesheet" type="text/css" />
        <link href="http://cdn.wijmo.com/jquery.wijmo-open.1.1.6.css" rel="stylesheet" type="text/css" />
        <link href="http://cdn.wijmo.com/jquery.wijmo-complete.1.1.6.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="jquery-wijmo.css" />
        <script id="scriptInit" src="jqueryJS.js" type="text/javascript"></script>
    </head>
    <body>
    <html>
        <!-- Begin Wrapper -->
        <div id="wrapper">

            <!-- Begin Header -->
            <div id="header">

                <div class="logo">
                    <h1 class="lineone">MapSkyline</h1> 
                    <!-- <h2 class="linetwo">template by: <a href="http://www.getcsstemplates.com">free css templates</a></h2> -->
                </div>		 

            </div>
            <!-- End Header -->

            <!-- Begin Navigation MENU-->
            <div id="navigation">

                <ul>                                              
                    <li><a class="current" href="#" title="">Consulta</a></li>
                    <li><a href="#" title="">Proyecto</a></li>
                    <li><a href="#" title="">Contacto</a></li>
                </ul>	 

            </div>
            <!-- End Navigation  EXPANDER   -->

            <!-- Begin Left Column -->
            <div id="leftcolumn">

                <div id="marcadores"  class="leftnav" style="overflow:auto; height:450px; display:none;">
                </div>
                <div id="boton_marcadores"  class="leftnav" style="display:none">
                                        <input id="nueva_consulta" type="button" value="Nueva Consulta">

                </div>
                <div id="controles" class="leftnav">
                    <label>
                        Ciudad</label>
                    <select id="ciudad">
                        <option value="nulo"> --- Seleccione --- </option>
                        <option value="Altlanta">Atlanta</option>
                        <option value="Baltimore">Baltimore</option>
                        <option value="Boston">Boston</option>
                        <option value="Chicago">Chicago</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Dallas">Dallas</option>
                        <option value="Houston">Houston</option>
                        <option value="Las Vegas">Las Vegas</option>
                        <option value="Long Island">Long Island</option>
                        <option value="Los Angeles">Los Angeles</option>
                        <option value="Miami">Miami</option>
                        <option value="New Jersey">New Jersey</option>
                        <option value="New Orleans">New Orleans</option>
                        <option value="New York">New York</option>
                        <option value="Philadelphia">Philadelphia</option>
                        <option value="San Diego">San Diego</option>
                        <option value="San Francisco">San Francisco</option>
                        <option value="Seattle">Seattle</option>
                        <option value="Washington">Washington</option>
                        <option value="Westchester">Westchester</option>
                    </select>
                    <label>
                        Tabla</label>
                    <select id="tabla">
                        <option value="nulo">--- Seleccione ---</option>
                        <option value="restaurantes_int_uso">Restaurantes</option>
                        <option value="hoteles_int">Hoteles</option>
                        <option value="bares_int_uso">Bares</option>
                        <option value="atracciones_int_uso">Atracciones</option>

                    </select>

                    <div id="atributos_rest" style="display:none">
                        <input value="comida" id="comida" type="checkbox" /><label for="comida">Comida</label> 

                        <input value="min" id="min_comida" type="radio" name="min_max1" /><label for="min">min</label>
                        <input value="max" id="max_comida" type="radio" name="min_max1" /><label for="max">max</label>

                        <br></br>
                        <input  value="decoracion" id="decoracion" type="checkbox" /><label for="decoracion">Decoracion</label>
                        <input value="min" id="min_decoracion" type="radio" name="min_max2" /><label for="min">min</label>
                        <input value="max" id="max_decoracion" type="radio" name="min_max2" /><label for="max">max</label>
                        <br></br>
                        <input  value="servicio" id="servicio" type="checkbox" /><label for="servicio">Servicio</label>
                        <input value="min" id="min_servicio" type="radio" name="min_max3" /><label for="min">min</label>
                        <input value="max" id="max_servicio" type="radio" name="min_max3" /><label for="max">max</label>
                        <br></br>
                        <input  value="costo" id="costo" type="checkbox" /><label for="costo">Costo</label>
                        <input value="min" id="min_costo" type="radio" name="min_max4" /><label for="min">min</label>
                        <input value="max" id="max_costo" type="radio" name="min_max4" /><label for="max">max</label>
                        <br></br>
                        <input value="distancia" id="distancia" type="checkbox" /><label for="distancia">Distancia</label>
                        <input value="min" id="min_distancia" type="radio" name="min_max5" /><label for="min">min</label>
                        <input value="max" id="max_distancia" type="radio" name="min_max5" /><label for="max">max</label>
                    </div>

                    <div id="atributos_hot" style="display:none">
                        <input  value="comida" id="comida_hot" type="checkbox" /><label for="comida_hot">Comida</label>
                        <input value="min" id="min_comida" type="radio" name="min_max1" /><label for="min">min</label>
                        <input value="max" id="max_comida" type="radio" name="min_max1" /><label for="max">max</label>
                        <br></br>
                        <input  value="servicio" id="servicio_hot" type="checkbox" /><label for="servicio_hot">Servicio</label>
                        <input value="min" id="min_servicio" type="radio" name="min_max2" /><label for="min">min</label>
                        <input value="max" id="max_servicio" type="radio" name="min_max2" /><label for="max">max</label>
                        <br></br>
                        <input  value="costo" id="costo_hot" type="checkbox" /><label for="costo_hot">Costo</label>
                        <input value="min" id="min_costo" type="radio" name="min_max3" /><label for="min">min</label>
                        <input value="max" id="max_costo" type="radio" name="min_max3" /><label for="max">max</label>
                        <br></br>
                        <input  value="distancia" id="distancia_hot" type="checkbox" /><label for="distancia_hot">Distancia</label>
                        <input value="min" id="min_distancia" type="radio" name="min_max4" /><label for="min">min</label>
                        <input value="max" id="max_distancia" type="radio" name="min_max4" /><label for="max">max</label>
                    </div>

                    <div id="algoritmo">
                        <input value="1" id="bnl" type="radio" name="algoritmo" /><label for="min">BNL</label>
                        <input value="2" id="sfs" type="radio" name="algoritmo" /><label for="max">SFS</label>
                    </div>
                    <input id="marcar" type="button" value="Marcar Punto"> 
                    <input id="consulta" type="button" value="Consulta"> 
                    
                    <input type= "hidden" id="lat" value="cero" name="lat"/>
                    
                    <input type="hidden" id="long" value="cero" name="long"/>

                </div>

            </div>

            <!-- End Left Column -->

            <!-- Begin Content Column -->
            <div id="content">

                <div id="mapa" style="width: 650px; height: 510px"></div>

                <!-- <h1>MAPA</h1> -->
            </div>
            <!-- End Content Column -->

            <!-- Begin Right Column 
            <div id="rightcolumn">

                <div class="leftnav">
                    <h4>Realiza tu Consulta</h4>

                </div>	

            </div> -->
            <!-- End Right Column -->

            <!-- Begin Footer -->
            <div id="footer">

                <p><a href="http://validator.w3.org/">Valid CSS</a> :: <a 

                        href="http://validator.w3.org/">Valid XHTML</a>  Copyright &copy; 2008 by your company :: 

                    Designed by: <a href="http://www.getcsstemplates.com/">free websie 

                        templates</a></p> 		

            </div>
            <!-- End Footer -->

        </div>
        <!-- End Wrapper -->

        <div style="text-align: center; font-size: 0.75em;">Design downloaded from <a href="http://www.freewebtemplates.com/">free website templates</a>.</div></body>
</html>
</body>
</html>