<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Monitoreo</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <meta http-equiv = "refresh" content="10"> 
    <link rel="stylesheet" type="text/css" href="estilos.css">
	<script src="https://kit.fontawesome.com/779ae99c75.js" crossorigin="anonymous"></script>
	<script defer src="animaciones.js"></script>
</head>

<body class="contenedorTotal">
    <header class="cabezera">
		<nav class="contenedor">
			<a href="#" class="logo contenedor-link">C.C. Las Americas</a>
			<button class="contenedor-boton aria-label="Abrir menú"><i class="fa-solid fa-bars"></i>
			</button>
				<ul class="contenedor-menu">
					<li class="contenedor-menu-item"><a href="#chiller" class="contenedor-menu-link contenedor-link">Chiller</a></li>
					<li class="contenedor-menu-item"><a href="#bomba_chiller" class="contenedor-menu-link contenedor-link">Bombas Chiller</a></li>
					<li class="contenedor-menu-item"><a href="#umas" class="contenedor-menu-link contenedor-link">UMAS</a></li>
					<li class="contenedor-menu-item"><a href="#extractores" class="contenedor-menu-link contenedor-link">Extractores</a></li>
					<li class="contenedor-menu-item"><a href="#ascensores" class="contenedor-menu-link contenedor-link contenedor-menu-link_active">Ascensores</a></li>
				</ul>
		</nav>
	</header>
  
    <div class="carrusel" >
        <div class="carrusel-items" >
            <div class="carrusel-item">
                <img src="imagenes/lobby.jpg">
            </div>
        </div>
    </div>
    
    <div class="titulo"  id="div_general">
        <div7>
        <!--<h1 id= "titulo_principal">Centro Comercial Las Americas</h1>-->
        <h2 id="titulo_secundario" class="letranormal" >Sistema de Monitoreo Departamento de Mantenimiento</h2>
        </div7>
    </div>
    

<?php
//////////////////////////////////////////codigo PHP/////////////////////////////////////////  
date_default_timezone_set("America/Caracas");
echo date('l jS \of F Y h:i:s A');
//date_default_timezone_get();
////////////////////////////////////////////////////////////////////////////////////////////   

require_once('conexion.php');  //llama al archivo conexion.php
$conn = new conexionweb(); //crea la conexion

//////////////////////////// tarjeta 5//////////////////////////////////
$consulta_select_5 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta5'";//selecciona datos en la tabla para ver su estado
$select_5 = mysqli_query($conn->conectardb2(),$consulta_select_5); //select
$row_5 = mysqli_fetch_row($select_5); //funcion crea un vector con los datos de la tarjeta 5
//echo"==>>>datos en la base con la tarjeta 5 <br>";
//echo"tarjeta=".$row_5[0].",chiller=".$row_5[2].",ascensor1=".$row_5[3].",planta1=".$row_5[1].", temperatura=".$row_5[4].",fecha=".$row_5[5]."<br>";//muestra el estado de la base de datos de la tarjeta 5 (importantisimo)


echo'<div6 class="contenedor_parametros">';  //  <<=======
echo'<img class="imagen_advertencia" id="imagen_adv"  src="imagenes/advertencia_amarilla.png">';
echo'<img class="imagen_advertencia" id="imagen_ok"  src="imagenes/ok.png">';

echo'<div20 id="tarjeta5">';
$estado_chiller=$row_5[2];
$estado_ascensor=$row_5[3];
$estado_planta=$row_5[1];
$estado_temperatura=$row_5[4];



echo"<h3>Plaza Central65 </h3>";    
    
echo"<p1>Temperatura= ".$row_5[4]." °C</p1><br>";
echo"<p1>Humedad Relativa = ".$row_5[1]." %</p1><br>";
echo"<br>";
echo"<p1>fecha=".$row_5[5]."</p1><br>";
echo"</div20>";
echo'<i id="icono_ojo" class="fa-sharp fa-solid fa-eye"></i>';
echo"</div6>";  //  <<====

/////////////////////////////////////////////////////////////////////
//////////////////////////// tarjeta 1//////////////////////////////////

$consulta_select_1 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta1'";//selecciona datos en la tabla para ver su estado
$select_1 = mysqli_query($conn->conectardb2(),$consulta_select_1); //select
$row_1 = mysqli_fetch_row($select_1); //funcion crea un vector con los datos de la tarjeta 5

$compresor1_chiller1=$row_1[6];
$compresor2_chiller1=$row_1[7];
$compresor3_chiller1=$row_1[8];
$flujo_chiller1=$row_1[9];
$temperatura_chiller1=$row_1[10];

echo'<section class="chiller" id="chiller">';
echo"<div5>"; 
//echo'<div class="contenedor_parametros" >'; ///****************************
echo'<img class="imagen_advertencia" id="imagen_adv_chiller1"  src="imagenes/advertencia_amarilla.png">';
echo'<img class="imagen_advertencia" id="imagen_ok_chiller1"  src="imagenes/ok.png">';
echo"<div2>";   //  <<=====


echo"<h3>Chiller # 1</h3>";

if ($compresor1_chiller1==1)
    {
        echo"<p1>Compresor1 chiller1</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($compresor1_chiller1==0)
    {
        echo"<p1>Compresor1 Chiller1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($compresor2_chiller1==1)
    {
        echo"<p1>Compresor2 Chiller1</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($compresor2_chiller1==0)
    {
        echo"<p1>Compresor2 Chiller1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($compresor3_chiller1==1)
    {
        echo"<p1>Compresor3 Chiller1</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($compresor3_chiller1==0)
    {
        echo"<p1>Compresor3 Chiller1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
/*if ($flujo_chiller1==1)
    {
        echo"<p1>Flujo de Agua del Chiller1</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($flujo_chiller1==0)
    {
        echo"<p1>Flujo de Agua del Chiller1</p1><p2> Encendido</p2>";
        echo"<br>";
    }    
*/
   // echo"<p1>Temperatura Salida= ".$row_1[10]." °C</p1><br>";
    //echo"<p1>Temperatura salida</p1><p2> $temperatura_chiller1</p2>";
    echo"<br>";
  
//echo"<br>";
echo"<p1>actualizacion=".$row_1[5]."</p1><br>";   
    
echo"</div2>";    //  <<======
echo'<i id="icono_ojo_chiller1" class="fa-sharp fa-solid fa-eye"></i>';
//echo"</div>";  //**********************************
/////////////////////////////////////////////////////////////////////    
//////////////////////////// tarjeta 2//////////////////////////////////

$consulta_select_2 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta2'";//selecciona datos en la tabla para ver su estado
$select_2 = mysqli_query($conn->conectardb2(),$consulta_select_2); //select
$row_2 = mysqli_fetch_row($select_2); //funcion crea un vector con los datos de la tarjeta 5

//$compresor1_chiller2=$row_2[11];
//$compresor2_chiller2=$row_2[12];
//$compresor3_chiller2=$row_2[13];
//$flujo_chiller2=$row_2[14];
//$switch_chiller2=$row_2[15];
//$corpoelec_440v=$row_2[16];

$compresor1_chiller2=$row_1[11];
$compresor2_chiller2=$row_1[12];
$compresor3_chiller2=$row_1[13];
$flujo_chiller2=$row_1[14];
$switch_chiller2=$row_1[15];
$corpoelec_440v=$row_1[16];

echo'<img class="imagen_advertencia" id="imagen_adv_chiller2"  src="imagenes/advertencia_amarilla.png">';
echo'<img class="imagen_advertencia" id="imagen_ok_chiller2"  src="imagenes/ok.png">';
echo"<div3>";  //  <<=======

echo"<h3>Chiller # 2</h3>";

/*if ($compresor1_chiller2==1)
    {
        echo"<p1>Compresor1 chiller2</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($compresor1_chiller2==0)
    {
        echo"<p1>Compresor1 Chiller2</p1><p2> Encendido</p2>";
        echo"<br>";
    }*/
if ($compresor2_chiller2==1)
    {
        echo"<p1>Compresor2 Chiller2</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($compresor2_chiller2==0)
    {
        echo"<p1>Compresor2 Chiller2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($compresor3_chiller2==1)
    {
        echo"<p1>Compresor3 Chiller2</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($compresor3_chiller2==0)
    {
        echo"<p1>Compresor3 Chiller2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
/*    
if ($flujo_chiller2==1)
    {
        echo"<p1>Flujo de Agua del Chiller2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($flujo_chiller2==0)
    {
        echo"<p1>Flujo de Agua del Chiller2</p1><p2> Encendido</p2>";
        echo"<br>";
    }    
if ($switch_chiller2==1)
    {
        echo"<p1>Switch del chiller2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($switch_chiller2==0)
    {
        echo"<p1>Switch del Chiller2</p1><p2> Encendido</p2>";
        echo"<br>";
    }    
if ($corpoelec_440v==1)
    {
        echo"<p1>Sin Suministro de Energia en 440 V</p1><p3> Apagada</p3>";
        echo"<br>";
    }*/

echo"<br>";
echo"<p1>actualizacion=".$row_2[5]."</p1><br>";

echo"</div3>";   // <<=======
echo'<i id="icono_ojo_chiller2" class="fa-sharp fa-solid fa-eye"></i>';
echo"</div5>";   // <<=======
echo'</section>';
/////////////////////////////////////////////////////////////////////  
    //////////////////////////// tarjeta 4//////////////////////////////////
/*
$consulta_select_4 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta4'";//selecciona datos en la tabla para ver su estado
$select_4 = mysqli_query($conn->conectardb2(),$consulta_select_4); //select
$row_4 = mysqli_fetch_row($select_4); //funcion crea un vector con los datos de la tarjeta 5

$switch_uma40ton=$row_4[26];
$motor_uma40ton=$row_4[27];
$falla_uma40ton=$row_4[28];
$reloj_uma40ton=$row_4[29];



echo'<section class="umas" id="umas">';
echo"<div15>";  //  <<=======
echo"<div11>";  //  <<=======

echo"<h3>Umas de 40 toneladas</h3>";

if ($switch_uma40ton==1)
    {
        echo"<p1>switch UMA 40ton</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($switch_uma40ton==0)
    {
        echo"<p1>switch UMA 40ton</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($motor_uma40ton==1)
    {
        echo"<p1>Motor UMA 40ton</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_uma40ton==0)
    {
        echo"<p1>Motor UMA 40ton</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_uma40ton==1)
    {
        echo"<p1>falla UMA 40ton</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_uma40ton==0)
    {
        echo"<p1>falla UMA 40ton</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($reloj_uma40ton==1)
    {
        echo"<p1>reloj UMA 40ton2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($reloj_uma40ton==0)
    {
        echo"<p1>reloj UMA 40ton</p1><p2> Encendido</p2>";
        echo"<br>";
    }    

echo"</div11>";   // <<=======

/////////////////////////////////////////////////////////////////////
    //////////////////////////// tarjeta 12//////////////////////////////////

$consulta_select_12 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta12'";//selecciona datos en la tabla para ver su estado
$select_12 = mysqli_query($conn->conectardb2(),$consulta_select_12); //select
$row_12 = mysqli_fetch_row($select_12); //funcion crea un vector con los datos de la tarjeta 5

$reloj_uma_sala17=$row_12[51];
$motor_uma_sala17=$row_12[52];
$falla_uma_sala17=$row_12[53];
//$reloj_uma40ton=$row_12[54];


echo"<div16>";  //  <<=======

echo"<h3>Umas de sala 17</h3>";

if ($reloj_uma_sala17==1)
    {
        echo"<p1>reloj uma sala17</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($reloj_uma_sala17==0)
    {
        echo"<p1>reloj uma sala17</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($motor_uma_sala17==1)
    {
        echo"<p1>motor uma sala17</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_uma_sala17==0)
    {
        echo"<p1>motor uma sala17</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_uma_sala17==0)
    {
        echo"<p1>falla uma sala17</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_uma_sala17==1)
    {
        echo"<p1>falla uma sala17</p1><p3> Apagada</p3>";
        echo"<br>";
    }

echo"</div16>";   // <<=======
echo"</div15>";
echo'</section>';

*/
/////////////////////////////////////////////////////////////////////

//////////////////////////// tarjeta 3//////////////////////////////////

$consulta_select_3 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta3'";//selecciona datos en la tabla para ver su estado
$select_3 = mysqli_query($conn->conectardb2(),$consulta_select_3); //select
$row_3 = mysqli_fetch_row($select_3); //funcion crea un vector con los datos de la tarjeta 5

$switch_bomba1_chiller=$row_3[17];
$motor_bomba1_chiller=$row_3[18];
$falla_bomba1_chiller=$row_3[19];
$switch_bomba2_chiller=$row_3[20];
$motor_bomba2_chiller=$row_3[21];
$falla_bomba2_chiller=$row_3[22];
$switch_bomba3_chiller=$row_3[23];
$motor_bomba3_chiller=$row_3[24];
$falla_bomba3_chiller=$row_3[25];

$motor_uma40ton=$row_3[27];

echo'<section class="bomba_chiller" id="bomba_chiller">';
echo"<div10>";   //  <<=========
echo'<img class="imagen_advertencia" id="imagen_adv_bombachiller"  src="imagenes/advertencia_amarilla.png">';
echo'<img class="imagen_advertencia" id="imagen_ok_bombachiller"  src="imagenes/ok.png">';
echo"<div4>";   //  <<==========

echo"<h3>Bomba # 1 del Sistema Chiller</h3>";

/*if ($switch_bomba1_chiller==1)
    {
        echo"<p1>Switch Bomba1</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($switch_bomba1_chiller==0)
    {
        echo"<p1>Switch Bomba1</p1><p2> Encendido</p2>";
        echo"<br>";
    }*/
if ($motor_bomba1_chiller==1)
    {
        echo"<p1>Motor Bomba1</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_bomba1_chiller==0)
    {
        echo"<p1>Motor Bomba1r</p1><p2> Encendido</p2>";
        echo"<br>";
    }
/*if ($falla_bomba1_chiller==1)
    {
        echo"<p1>Falla Bomba1</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_bomba1_chiller==0)
    {
        echo"<p1>Falla Bomba1</p1><p2> Encendido</p2>";
        echo"<br>";
    }*/
 
echo"</div4>";  //  <<========
echo"<div8>";  //  <<========
    
echo"<h3>Bomba # 2 del Sistema Chiller</h3>";   
    
/*if ($switch_bomba2_chiller==1)
    {
        echo"<p1>Switch bomba2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($switch_bomba2_chiller==0)
    {
        echo"<p1>Switch Bomba2</p1><p2> Encendido</p2>";
        echo"<br>";
    } */   
if ($motor_bomba2_chiller==1)
    {
        echo"<p1>Motor Bomba2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($motor_bomba2_chiller==0)
    {
        echo"<p1>Motor Bomba2</p1><p2> Encendido</p2>";
        echo"<br>";
    }    
/*if ($falla_bomba2_chiller==1)
    {
        echo"<p1>Falla Bomba2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_bomba2_chiller==0)
    {
        echo"<p1>Falla Bomba2</p1><p2> Encendido</p2>";
        echo"<br>";
    } */
    
echo"</div8>";  //  <<========
echo"<div9>";  //  <<========

echo"<h3>Bomba # 3 del Sistema Chiller</h3>";   
    
/*if ($switch_bomba3_chiller==1)
    {
        echo"<p1>Switch Bomba3</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($switch_bomba3_chiller==0)
    {
        echo"<p1>Switch Bomba3</p1><p2> Encendido</p2>";
        echo"<br>";
    }*/    
if ($motor_bomba3_chiller==1)
    {
        echo"<p1>Motor Bomba3</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($motor_bomba3_chiller==0)
    {
        echo"<p1>Motor Bomba3</p1><p2> Encendido</p2>";
        echo"<br>";
    }    
/*if ($falla_bomba3_chiller==1)
    {
        echo"<p1>Falla Bomba3</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_bomba3_chiller==0)
    {
        echo"<p1>Falla Bomba3</p1><p2> Encendido</p2>";
        echo"<br>";
    } */
    
echo"</div9>";  //  <<========

echo"<div11>";  //  <<=======


echo"<h3>Umas de 40 toneladas</h3>";

if ($motor_uma40ton==1)
    {
        echo"<p1>Motor UMA 40ton</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_uma40ton==0)
    {
        echo"<p1>Motor UMA 40ton</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    

echo"</div11>";   

echo"</div10>";   //  <<=========
echo"<br>";
echo"<p1>actualizacion=".$row_3[5]."</p1><br>";
echo'</section>';
/////////////////////////////////////////////////////////////////////    
//////////////////////////// tarjeta 6//////////////////////////////////

$consulta_select_6 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta6'";//selecciona datos en la tabla para ver su estado
$select_6 = mysqli_query($conn->conectardb2(),$consulta_select_6); //select
$row_6 = mysqli_fetch_row($select_6); //funcion crea un vector con los datos de la tarjeta 5

$switch_extractor1=$row_6[30];
$motor_extractor1=$row_6[31];
$falla_extractor1=$row_6[32];
$reloj_estractor1=$row_6[33];
$switch_extractor2=$row_6[34];
$motor_extractor2=$row_6[35];
$falla_extractor2=$row_6[36];
$reloj_estractor2=$row_6[37];
$corpoelec_220v=$row_6[38];   //   <<=======   corpoelec 220
$energizado_asc_corp=$row_6[39];

echo'<section class="extractores" id="extractores">';
echo"<div12>";  //  <<=======
echo"<div13>";  //  <<=======

echo"<h3>Sistema de Extractores de Feria Baja</h3>";

if ($switch_extractor1==1)
    {
        echo"<p1>Extractor Sur Grande</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($switch_extractor1==0)
    {
        echo"<p1>Extractor Sur Grande</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($motor_extractor1==1)
    {
        echo"<p1>Extractor Sur Pequeño</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_extractor1==0)
    {
        echo"<p1>Extractor Sur Pequeño</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_extractor1==1)
    {
        echo"<p1>Extractor Norte Grande</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_extractor1==0)
    {
        echo"<p1>Extractor Norte Grande</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($reloj_estractor1==1)
    {
        echo"<p1>Extractor Norte Pequeño</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($reloj_estractor1==0)
    {
        echo"<p1>Extractor Norte Pequeño</p1><p2> Encendido</p2>";
        echo"<br>";
    } 
    
  echo"<h3>Aires Acondicionados de Feria Alta</h3>";  
    
if ($switch_extractor2==1)
    {
        echo"<p1>Compresor AA_1_1</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($switch_extractor2==0)
    {
        echo"<p1>Compresor AA_1_1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($motor_extractor2==1)
    {
        echo"<p1>Compresor AA_1_2</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_extractor2==0)
    {
        echo"<p1>Compresor AA_1_2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_extractor2==1)
    {
        echo"<p1>Compresor AA_2_1</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_extractor2==0)
    {
        echo"<p1>Compresor AA_2_1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($reloj_estractor2==1)
    {
        echo"<p1>Compresor AA_2_2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($reloj_estractor2==0)
    {
        echo"<p1>Compresor AA_2_2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($corpoelec_220v==1)
    {
        echo"<p1>Compresor AA_3_1</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($corpoelec_220v==0)
    {
        echo"<p1>Compresor AA_3_1</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($energizado_asc_corp==1)
    {
        echo"<p1>Compresor AA_3_2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($energizado_asc_corp==0)
    {
        echo"<p1>Compresor AA_3_2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
echo"<br>";
echo"<p1>actualizacion=".$row_6[5]."</p1><br>";    

echo"</div13>";   // <<=======
///////////////////////////////////////////////////////////////////// 
//////////////////////////// tarjeta 7//////////////////////////////////
/*
$consulta_select_7 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta7'";//selecciona datos en la tabla para ver su estado
$select_7 = mysqli_query($conn->conectardb2(),$consulta_select_7); //select
$row_7 = mysqli_fetch_row($select_7); //funcion crea un vector con los datos de la tarjeta 7

$switch_extractor2=$row_7[34];
$motor_extractor2=$row_7[35];
$falla_extractor2=$row_7[36];
$reloj_estractor2=$row_7[37];
$corpoelec_220v=$row_7[38];   //   <<=======   corpoelec 220

echo"<div14>";  //  <<=======

echo"<h3>Sistema 2 de Extractores de Feria</h3>";

if ($switch_extractor2==1)
    {
        echo"<p1>switch extractor</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($switch_extractor2==0)
    {
        echo"<p1>switch extractor2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($motor_extractor2==1)
    {
        echo"<p1>motor extractor2</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($motor_extractor2==0)
    {
        echo"<p1>motor extractor2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_extractor2==1)
    {
        echo"<p1>falla extractor2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($falla_extractor2==0)
    {
        echo"<p1>falla extractor2</p1><p2> Encendido</p2>";
        echo"<br>";
    }
    
if ($reloj_estractor2==1)
    {
        echo"<p1>reloj estractor2</p1><p3> Apagada</p3>";
        echo"<br>";
    }
if ($reloj_estractor2==0)
    {
        echo"<p1>reloj estractor2</p1><p2> Encendido</p2>";
        echo"<br>";
    }    

echo"</div14>";   // <<=======
echo"</div12>";   // <<=======
echo'</section>';
*/

/////////////////////////////////////////////////////////////////////
//////////////////////////// tarjeta 8//////////////////////////////////

$consulta_select_8 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta8'";//selecciona datos en la tabla para ver su estado
$select_8 = mysqli_query($conn->conectardb2(),$consulta_select_8); //select
$row_8 = mysqli_fetch_row($select_8); //funcion crea un vector con los datos de la tarjeta 5

$energizado_asc_corp=$row_8[39];
$funcionamiento_asc_corp=$row_8[40];
$falla_asc_corp=$row_8[41];

echo'<section class="ascensores" id="ascensores">';
echo"<div17>";  //  <<=======
echo'<img class="imagen_advertencia" id="imagen_adv_asc_corp"  src="imagenes/advertencia_amarilla.png">';
echo'<img class="imagen_advertencia" id="imagen_ok_asc_corp"  src="imagenes/ok.png">';
echo"<div18>";  //  <<=======

echo"<h3>Ascensor Corporativo</h3>";

if ($energizado_asc_corp==1)
    {
        echo"<p1>energizado asc corp</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($energizado_asc_corp==0)
    {
        echo"<p1>energizado asc corp</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($funcionamiento_asc_corp==1)
    {
        echo"<p1>func asc corp</p1><p3> Detenido</p3>";
        echo"<br>";
    }
if ($funcionamiento_asc_corp==0)
    {
        echo"<p1>func asc corp</p1><p2> En Movimiento</p2>";
        echo"<br>";
    }
if ($falla_asc_corp==0)
    {
        echo"<p1>falla asc corp</p1><p3> Presente</p3>";
        echo"<br>";
    }
if ($falla_asc_corp==1)
    {
        echo"<p1>falla asc corp</p1><p2> Ausente</p2>";
        echo"<br>";
    }
echo"<br>";
echo"<p1>actualizacion=".$row_8[5]."</p1><br>";
echo"</div18>";   // <<=======
echo'<i id="icono_ojo_asc_corp" class="fa-sharp fa-solid fa-eye"></i>';

/////////////////////////////////////////////////////////////////////
//////////////////////////// tarjeta 9//////////////////////////////////

$consulta_select_9 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta9'";//selecciona datos en la tabla para ver su estado
$select_9 = mysqli_query($conn->conectardb2(),$consulta_select_9); //select
$row_9 = mysqli_fetch_row($select_9); //funcion crea un vector con los datos de la tarjeta 5

$energizado_asc_lobbynorte=$row_9[42];
$funcionamiento_asc_lobbynorte=$row_9[43];
$falla_asc_lobbynorte=$row_9[44];

echo"<div19>";  //  <<=======

echo"<h3>Ascensor Lobby Norte</h3>";

if ($energizado_asc_lobbynorte==1)
    {
        echo"<p1>energizado asc lobby norte</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($energizado_asc_lobbynorte==0)
    {
        echo"<p1>energizado asc lobby norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($funcionamiento_asc_lobbynorte==1)
    {
        echo"<p1>func asc lobby norte</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($funcionamiento_asc_lobbynorte==0)
    {
        echo"<p1>func asc clobby norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_lobbynorte==0)
    {
        echo"<p1>falla asc lobby norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_lobbynorte==1)
    {
        echo"<p1>falla asc lobby norte</p1><p3> Apagada</p3>";
        echo"<br>";
    }

echo"</div19>";   // <<=======

/////////////////////////////////////////////////////////////////////
//////////////////////////// tarjeta 10//////////////////////////////////

$consulta_select_10 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta10'";//selecciona datos en la tabla para ver su estado
$select_10 = mysqli_query($conn->conectardb2(),$consulta_select_10); //select
$row_10 = mysqli_fetch_row($select_10); //funcion crea un vector con los datos de la tarjeta 5

$energizado_asc_lobbysur=$row_10[45];
$funcionamiento_asc_lobbysur=$row_10[46];
$falla_asc_lobbysur=$row_10[47];

echo"<div20>";  //  <<=======

echo"<h3>Ascensor Lobby Sur</h3>";

if ($energizado_asc_lobbysur==1)
    {
        echo"<p1>energizado asc lobby sur</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($energizado_asc_lobbysur==0)
    {
        echo"<p1>energizado asc lobby sur</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($funcionamiento_asc_lobbysur==1)
    {
        echo"<p1>func asc lobby sur</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($funcionamiento_asc_lobbysur==0)
    {
        echo"<p1>func asc clobby sur</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_lobbysur==0)
    {
        echo"<p1>falla asc lobby sur</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_lobbysur==1)
    {
        echo"<p1>falla asc lobby sur</p1><p3> Apagada</p3>";
        echo"<br>";
    }

echo"</div20>";   // <<=======

/////////////////////////////////////////////////////////////////////
//////////////////////////// tarjeta 11//////////////////////////////////

$consulta_select_11 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta11'";//selecciona datos en la tabla para ver su estado
$select_11 = mysqli_query($conn->conectardb2(),$consulta_select_11); //select
$row_11 = mysqli_fetch_row($select_11); //funcion crea un vector con los datos de la tarjeta 5

$energizado_asc_carganorte=$row_11[48];
$funcionamiento_asc_carganorte=$row_11[49];
$falla_asc_carganorte=$row_11[50];

echo"<div21>";  //  <<=======

echo"<h3>Ascensor Carga Norte</h3>";

if ($energizado_asc_carganorte==1)
    {
        echo"<p1>energizado asc carga norte</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($energizado_asc_carganorte==0)
    {
        echo"<p1>energizado asc carga norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($funcionamiento_asc_carganorte==1)
    {
        echo"<p1>func asc carga norte</p1><p3> Apagado</p3>";
        echo"<br>";
    }
if ($funcionamiento_asc_carganorte==0)
    {
        echo"<p1>func asc carga norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_carganorte==0)
    {
        echo"<p1>falla asc carga norte</p1><p2> Encendido</p2>";
        echo"<br>";
    }
if ($falla_asc_carganorte==1)
    {
        echo"<p1>falla asc carga norte</p1><p3> Apagada</p3>";
        echo"<br>";
    }

echo"</div21>";   // <<=======
echo"</div17>";   // <<=======
echo'</section>';
//////////////////////////////////fin de codigo PHP///////////////////////////////////
?>

<script>

compresor1_chiller1=('<?php echo $compresor1_chiller1 ?>');
compresor2_chiller1=('<?php echo $compresor2_chiller1 ?>');
compresor3_chiller1=('<?php echo $compresor3_chiller1 ?>');

compresor2_chiller2=('<?php echo $compresor2_chiller2 ?>');
compresor3_chiller2=('<?php echo $compresor3_chiller2 ?>');

motor_bomba1_chiller=('<?php echo $motor_bomba1_chiller ?>');
motor_bomba2_chiller=('<?php echo $motor_bomba2_chiller ?>');
motor_bomba3_chiller=('<?php echo $motor_bomba3_chiller ?>');

motor_uma40ton=('<?php echo $motor_uma40ton ?>');

temperatura_feriabaja=('<?php echo $estado_temperatura ?>');

energizado_asc_corp=('<?php echo $energizado_asc_corp ?>');
funcionamiento_asc_corp=('<?php echo $funcionamiento_asc_corp ?>');
falla_asc_corp=('<?php echo $falla_asc_corp ?>');


</script>


  
<footer class="footer">
    <h5>Gerencia de Mantenimiento e Ingenieria gustavo mujica</h5>
        <div id=img_foot>
            <img id="img_footer" src="imagenes/footer.png">
        </div>
</footer>

</body>
</html>