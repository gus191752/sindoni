<?php

require_once('conexion.php');  //llama al archivo conexion.php

$tarjeta=$_POST['device_label'];      //obtiene el dato de html

//////////////////////tarjeta 1 //////////////////////////////
$compresor1_chiller1=$_POST['compresor1_chiller1'];
$compresor2_chiller1=$_POST['compresor2_chiller1'];
$compresor3_chiller1=$_POST['compresor3_chiller1'];
$flujo_chiller1=$_POST['flujo_chiller1'];
$temperatura_chiller1=$_POST['temperatura_chiller1'];
//////////////////////tarjeta 2 //////////////////////////////
$compresor1_chiller2=$_POST['compresor1_chiller2'];
$compresor2_chiller2=$_POST['compresor2_chiller2'];
$compresor3_chiller2=$_POST['compresor3_chiller2'];
$flujo_chiller2=$_POST['flujo_chiller2'];
$switch_chiller2=$_POST['switch_chiller2'];
$corpoelec_440v=$_POST['corpoelec_440v'];
//////////////////////tarjeta 3 //////////////////////////////
$switch_bomba1_chiller=$_POST['switch_bomba1_chiller'];
$motor_bomba1_chiller=$_POST['motor_bomba1_chiller'];
$falla_bomba1_chiller=$_POST['falla_bomba1_chiller'];
$switch_bomba2_chiller=$_POST['switch_bomba2_chiller'];
$motor_bomba2_chiller=$_POST['motor_bomba2_chiller'];
$falla_bomba2_chiller=$_POST['falla_bomba2_chiller'];
$switch_bomba3_chiller=$_POST['switch_bomba3_chiller'];
$motor_bomba3_chiller=$_POST['motor_bomba3_chiller'];
$falla_bomba3_chiller=$_POST['falla_bomba3_chiller'];
//////////////////////tarjeta 4 //////////////////////////////
$switch_uma40ton=$_POST['switch_uma40ton'];
$motor_uma40ton=$_POST['motor_uma40ton'];
$falla_uma40ton=$_POST['falla_uma40ton'];
$reloj_uma40ton=$_POST['reloj_uma40ton'];
//////////////////////tarjeta 5//////////////////////////
$chiller=$_POST['chiller'];
$ascensor1=$_POST['ascensor1'];
$planta=$_POST['planta_sur'];
$temperatura=$_POST['temperature'];
//////////////////////tarjeta 6 //////////////////////////////
$switch_extractor1=$_POST['switch_extractor1'];
$motor_extractor1=$_POST['motor_extractor1'];
$falla_extractor1=$_POST['falla_extractor1'];
$reloj_estractor1=$_POST['reloj_estractor1'];
//////////////////////tarjeta 7 //////////////////////////////
$switch_extractor2=$_POST['switch_extractor2'];
$motor_extractor2=$_POST['motor_extractor2'];
$falla_extractor2=$_POST['falla_extractor2'];
$reloj_extractor2=$_POST['reloj_extractor2'];
$corpoelec_220v=$_POST['corpoelec_220v'];
//////////////////////tarjeta 8 //////////////////////////////
$energizado_asc_corp=$_POST['energizado_asc_corp'];
$funcionamiento_asc_corp=$_POST['funcionamiento_asc_corp'];
$falla_asc_corp=$_POST['falla_asc_corp'];
//////////////////////tarjeta 9 //////////////////////////////
$energizado_asc_lobbynorte=$_POST['energizado_asc_lobbynorte'];
$funcionamiento_asc_lobbynorte=$_POST['funcionamiento_asc_lobbynorte'];
$falla_asc_lobbynorte=$_POST['falla_asc_lobbynorte'];
//////////////////////tarjeta 10 //////////////////////////////
$energizado_asc_lobbysur=$_POST['energizado_asc_lobbysur'];
$funcionamiento_asc_lobbysur=$_POST['funcionamiento_asc_lobbysur'];
$falla_asc_lobbysur=$_POST['falla_asc_lobbysur'];
//////////////////////tarjeta 11 //////////////////////////////
$energizado_asc_carganorte=$_POST['energizado_asc_carganorte'];
$funcionamiento_asc_carganorte=$_POST['funcionamiento_asc_carganorte'];
$falla_asc_carganorte=$_POST['falla_asc_carganorte'];
//////////////////////tarjeta 12 //////////////////////////////
$reloj_uma_sala17=$_POST['reloj_uma_sala17'];
$motor_uma_sala17=$_POST['motor_uma_sala17'];
$falla_uma_sala17=$_POST['falla_uma_sala17'];
///////////////////////////////////////////////////////////////////

$conn = new conexionweb(); //crea la conexion

//$consulta_insert = "INSERT INTO historicodedispositivos(idtarjeta,variable,valor_variable,fecha) VALUES ('$tarjeta','chiller','$chiller',NOW())";//inserta datos en la tabla
//$insert = mysqli_query($conn->conectardb(),$consulta_insert); //inserta chiller l

//$consulta_insert = "INSERT INTO historicodedispositivos(idtarjeta,variable,valor_variable,fecha) VALUES ('$tarjeta','asc_1','$ascensor1',NOW())";
//$insert = mysqli_query($conn->conectardb(),$consulta_insert); //inserta humedad
///////////////////////////////////UPDATE/////////////////////////////////////////////////////////////////////////////
$consulta_update = "UPDATE estado_dispositivo SET compresor1_chiller1='$compresor1_chiller1',compresor2_chiller1='$compresor2_chiller1',compresor3_chiller1='$compresor3_chiller1',flujo_chiller1='$flujo_chiller1',temperatura_chiller1='$temperatura_chiller1',compresor1_chiller2='$compresor1_chiller2', compresor2_chiller2='$compresor2_chiller2',compresor3_chiller2='$compresor3_chiller2',flujo_chiller2='$flujo_chiller2',switch_chiller2='$switch_chiller2', corpoelec_440v='$corpoelec_440v',switch_bomba1_chiller='$switch_bomba1_chiller',motor_bomba1_chiller='$motor_bomba1_chiller',falla_bomba1_chiller='$falla_bomba1_chiller',switch_bomba2_chiller='$switch_bomba2_chiller', motor_bomba2_chiller='$motor_bomba2_chiller',falla_bomba2_chiller='$falla_bomba2_chiller', switch_bomba3_chiller='$switch_bomba3_chiller',motor_bomba3_chiller='$motor_bomba3_chiller',falla_bomba3_chiller='$falla_bomba3_chiller',switch_uma40ton='$switch_uma40ton',motor_uma40ton='$motor_uma40ton',falla_uma40ton='$falla_uma40ton',reloj_uma40ton='$reloj_uma40ton',chiller_1= '$chiller',ascensor1_1='$ascensor1',planta_sur_1='$planta',temperature_1='$temperatura',fecha= NOW(),switch_extractor1='$switch_extractor1',motor_extractor1='$motor_extractor1', falla_extractor1='$falla_extractor1',reloj_estractor1='$reloj_estractor1',switch_extractor2='$switch_extractor2',motor_extractor2='$motor_extractor2', falla_extractor2='$falla_extractor2',reloj_extractor2='$reloj_extractor2',corpoelec_220v='$corpoelec_220v',energizado_asc_corp='$energizado_asc_corp', funcionamiento_asc_corp='$funcionamiento_asc_corp',falla_asc_corp='$falla_asc_corp',energizado_asc_lobbynorte='$energizado_asc_lobbynorte', funcionamiento_asc_lobbynorte='$funcionamiento_asc_lobbynorte',falla_asc_lobbynorte='$falla_asc_lobbynorte',energizado_asc_lobbysur='$energizado_asc_lobbysur', funcionamiento_asc_lobbysur='$funcionamiento_asc_lobbysur',falla_asc_lobbysur='$falla_asc_lobbysur',reloj_uma_sala17='$reloj_uma_sala17',motor_uma_sala17='$motor_uma_sala17',falla_uma_sala17='$falla_uma_sala17' WHERE num_tarjeta = '$tarjeta'"; //actualiza datos en la tabla (importantisimo)
$update = mysqli_query($conn->conectardb2(),$consulta_update); //Update

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$consulta_select = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='$tarjeta'";//selecciona datos en la tabla para ver su estado
$select = mysqli_query($conn->conectardb2(),$consulta_select); //select
$row = mysqli_fetch_row($select); //funcion crea un vector
//echo"datos en la base con la tarjeta ingresada <br>";
//echo"{tarjeta=".$row[0].",chiller=".$row[2].",ascensor1=".$row[3].",planta1=".$row[1].",temperatura_1=".$row[4]."}<br>";//muestra el estado de la base de datos (importantisimo)


//////////////////////////// tarjeta 1//////////////////////////////////
$consulta_select_1 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta1'";//selecciona datos en la tabla para ver su estado
$select_1 = mysqli_query($conn->conectardb2(),$consulta_select_1); //select
$row_1 = mysqli_fetch_row($select_1); //funcion crea un vector con los datos de la tarjeta 1
//echo"==>>>datos en la base con la tarjeta 1 <br>";
//echo"{tarjeta=".$row_1[0].",Acompresor1_chiller1=".$row_1[6].",Acompresor2_chiller1=".$row_1[7].",Acompreso3_chiller1=".$row_1[8].",flujo_chiller1=".$row_1[9].",Temperatura_chiller1=".$row_1[10]."}<br>";//muestra el estado de la base de datos de la tarjeta 1 (importantisimo)

//////////////////////////// tarjeta 2//////////////////////////////////
$consulta_select_2 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta2'";//selecciona datos en la tabla para ver su estado
$select_2 = mysqli_query($conn->conectardb2(),$consulta_select_2); //select
$row_2 = mysqli_fetch_row($select_2); //funcion crea un vector con los datos de la tarjeta 2
//echo"==>>>datos en la base con la tarjeta 2 <br>";
//echo"{tarjeta=".$row_2[0].",chiller=".$row_2[2].",ascensor1=".$row_2[3].",planta1=".$row_2[1].",temperatura_1=".$row_2[4].",fecha=".$row_2[5]."}<br>";//muestra el estado de la base de datos de la tarjeta 2 (importantisimo)

//////////////////////////// tarjeta 3//////////////////////////////////
$consulta_select_3 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta3'";//selecciona datos en la tabla para ver su estado
$select_3 = mysqli_query($conn->conectardb2(),$consulta_select_3); //select
$row_3 = mysqli_fetch_row($select_3); //funcion crea un vector con los datos de la tarjeta 4
//echo"==>>>datos en la base con la tarjeta 3 <br>";
//echo"{tarjeta=".$row_3[0].",chiller=".$row_3[2].",ascensor1=".$row_3[3].",planta1=".$row_3[1].",temperatura_1=".$row_3[4].",fecha=".$row_3[5]."}<br>";//muestra el estado de la base de datos de la tarjeta 3 (importantisimo)

//////////////////////////// tarjeta 4//////////////////////////////////
$consulta_select_4 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta4'";//selecciona datos en la tabla para ver su estado
$select_4 = mysqli_query($conn->conectardb2(),$consulta_select_4); //select
$row_4 = mysqli_fetch_row($select_4); //funcion crea un vector con los datos de la tarjeta 4
//echo"==>>>datos en la base con la tarjeta 4 <br>";
//echo"{tarjeta=".$row_4[0].",chiller=".$row_4[2].",ascensor1=".$row_4[3].",planta1=".$row_4[1].",temperatura_1=".$row_4[4].",fecha=".$row_4[5]."}<br>";//muestra el estado de la base de datos de la tarjeta 4 (importantisimo)

//////////////////////////// tarjeta 5//////////////////////////////////
$consulta_select_5 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta5'";//selecciona datos en la tabla para ver su estado
$select_5 = mysqli_query($conn->conectardb2(),$consulta_select_5); //select
$row_5 = mysqli_fetch_row($select_5); //funcion crea un vector con los datos de la tarjeta 5
//echo"==>>>datos en la base con la tarjeta 5 <br>";
echo"{Achiller=".$row_5[2].",Aascensor1=".$row_5[3].",Aplanta1=".$row_5[1].", Atemperatura=".$row_5[4].",Afecha=".$row_5[5]."}<br>";//muestra el estado de la base de datos de la tarjeta 5 (importantisimo)
/////////////////////////////////////////////////////////////////////

//////////////////////////// tarjeta 8//////////////////////////////////
$consulta_select_8 = "SELECT * FROM estado_dispositivo WHERE num_tarjeta='tarjeta8'";//selecciona datos en la tabla para ver su estado
$select_8 = mysqli_query($conn->conectardb2(),$consulta_select_8); //select
$row_8 = mysqli_fetch_row($select_8); //funcion crea un vector con los datos de la tarjeta 1
//echo"==>>>datos en la base con la tarjeta 8 <br>";
echo"{Aenergizado_asc_corp=".$row_8[39].",Afuncionamiento_asc_corp=".$row_8[40].",Afalla_asc_corp=".$row_8[41]."}<br>";//muestra el estado de la base de datos de la tarjeta 1 (importantisimo)



//$consulta_select_tarjeta3 = "SELECT chiller FROM estado_dispositivo WHERE num_tarjeta='tarjeta3'";//selecciona datos  de una columna en especifico en la tabla para ver su estado
//$select_tarjeta3 = mysqli_query($conn->conectardb2(),$consulta_select_tarjeta3); //select
//$row_tarjeta3 = mysqli_fetch_row($select_tarjeta3); //funcion crea un vector
//echo"{chiller=".$row_tarjeta3
//[0].",estado del chiller en la tarjeta 3}<br>";//muestra el estado de la base de datos (importantisimo)



//echo"datos enviados desde html <br>";
//echo"{Tipo_tarjeta:".$tarjeta.",chiller:".$chiller.",ascensor1:".$ascensor1."}";

?>