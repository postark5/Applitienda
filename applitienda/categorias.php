<?php
// Definir variables
$codigo="";
$nom_categoria="";
// $apellidos ="";
// $email ="";
// $direc = "";
// $ciudad = "";
// $pais = "";
// $telef = "";
//$fecha= "";

//require("conectando.php");  // No es aplicable para mostrar una imagen o foto
// Para la conexi�n se considera may�sculas o min�sculas en los nombres.
// Conectarse con el servidor
 $cn = mysqli_connect("localhost","root","") or die("NO SE PUDO CONECTAR CON EL SERVIDOR");
// Conectarse con la base de datos
 mysqli_select_db($cn,"bdgestion") or die("�NO SE PUDO CONECTAR CON LA BASE DE DATOS. POR FAVOR CREAR LA BASE DE DATOS Y TABLAS!");
//Manejo de formatos de fecha mediante FDU

 $fecha = date("d/m/Y");

function cambiaf_a_mysql($fecha) 
{ 
if (substr($fecha,5,1)!="/"){
$fechasal=substr($fecha,-2)."/".substr($fecha,5,2 )."/".substr($fecha,0,4);
} else {
$fechasal=substr($fecha,-4)."/".substr($fecha,3,2 )."/".substr($fecha,0,2);
};
return $fechasal; 

}


function cambiaf_a_normal($MySQLFecha) 
{ 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("d/m/Y",strtotime($MySQLFecha));} 
} 



 if (isset($_POST["btnPrimero"])) 
{

  $n = 0;
    $rs=mysqli_query($cn,"select * from categorias ORDER BY id_categoria");

    $num_rows = mysqli_num_rows($rs);
        
  if($num_rows == NULL)
    {
       // return NULL;  // Vuelve a una p�gina en blanco
     echo "<center><h2>�Error. No existen registros!</h2></center>";
    }

  else

 {
   mysqli_data_seek($rs,$n);
   $campo=mysqli_fetch_array($rs);

   $codigo = $campo[0];
   $nom_categoria = $campo[1];
   
}
}

elseif(isset($_POST["btnAnterior"])) {

 $codigo=(int)$_POST["txtc"];  

 $consulta = "SELECT * FROM categorias WHERE id_categoria < $codigo ORDER BY id_categoria DESC LIMIT 0,1";

 $rs = mysqli_query($cn,$consulta);

$campo = mysqli_fetch_array($rs);
   $codigo = $campo[0];
   $nom_categoria = $campo[1];
   
}


elseif(isset($_POST["btnSiguiente"])) {

 $codigo=(int)$_POST["txtc"]; 

$consulta = "SELECT * FROM categorias WHERE id_categoria > $codigo ORDER BY id_categoria LIMIT 0,1";

$rs = mysqli_query($cn,$consulta);

$campo = mysqli_fetch_array($rs);
   $codigo = $campo[0];
   $nom_categoria = $campo[1];
   
}

elseif(isset($_POST["btnUltimo"])) {

  $rs=mysqli_query($cn,"select * from categorias order by id_categoria");

    $num_rows = mysqli_num_rows($rs);
        
    if($num_rows == NULL)
    {
       // return NULL; // Vuelve a una p�gina en blanco
    echo "<center><h2>�Error. No existen registros!</h2></center>";
    }

else

{

$last_row = mysqli_num_rows($rs) - 1;
mysqli_data_seek($rs, $last_row);

$campo=mysqli_fetch_array($rs);

   $codigo = $campo[0];
   $nom_categoria = $campo[1];
   
}
}

elseif(isset($_POST["btnConsulta"])) {

$codigo = $_POST["txtc"];
if ( $codigo != ""  )
{
// Recuperamos datos de la tabla
$consulta = "SELECT * FROM categorias WHERE id_categoria = $codigo";

$rs = mysqli_query($cn,$consulta) or die(mysql_error($cn));

    $num_rows = mysqli_num_rows($rs);
        
    if($num_rows == NULL)
    {
       // return NULL; // Vuelve a una p�gina en blanco
    echo "<center><h2>�Error. No existe el registro!</h2></center>";
    }
   else
  {

   $campo = mysqli_fetch_array($rs);

   $codigo = $campo[0];
   $nom_categoria = $campo[1];
}

}

}

elseif(isset($_POST["btnIngreso"])) {
// Se pulsa el bot�n Ingreso para grabar directamente los datos. No pulsar Grabar.

 //$archivo = $_FILES["archivito"]["tmp_name"]; 
 //$nom = $_FILES["archivito"]["name"];
 //$tamanio = $_FILES["archivito"]["size"];     
// $tipo    = $_FILES["archivito"]["type"];
 $codigo  = $_POST["txtc"];
 $nom_categoria  = $_POST["txtn"]; 
 
  
 if ($codigo != "")
  {
   echo "<center><h2>!No ingrese el c�digo, este se autogenera�</h2></center>";
 
  }
  else 
  {
 //if ( $archivo != ""  )
 //{
    //$fp = fopen($archivo, "rb");
    //$foto = fread($fp, $tamanio);
    //$foto = addslashes($foto);
    //fclose($fp); 

    $qry = "INSERT INTO categorias (nom_categoria) VALUES 
            ('$nom_categoria')";

    mysqli_query($cn,$qry);

    if(mysqli_affected_rows($cn) > 0) {
       echo "<center><h2>Se ha guardado el registro en la base de datos.</h2></center>";
     
     }
    else
       echo "<center><h2>NO se ha podido guardar el registro en la base de datos. !El c�digo ya existe�</h2></center>";
  //if (! move_uploaded_file ($_FILES['archivito']['tmp_name'], "directorio/".$_FILES['archivito']['name'])) {

    // echo "<center><h2>No se ha podido copiar el archivo</h2></center>";
     

     //}
  
 //}
 //else
  //  {
  //  echo "<center><h2>Seleccione la foto y/o complete los datos</h2></center>";
  //  $fecha= cambiaf_a_normal ($fecha);
  //  }
}

}

elseif(isset($_POST["btnListado"])) {
// Realiza una consulta total de los clientes al pulsar el bot�n Listado.
include 'lecturacat.php'; // Ejecuta el programa lectura.php

}


elseif(isset($_POST["btnElimina"])) {
// Elimina el registro consultado

$codigo=$_POST["txtc"];
if ( $codigo != "")
{

//Creamos la sentencia SQL y la ejecutamos
$consulta="Delete From categorias Where id_categoria='$codigo'";

mysqli_query($cn,$consulta);
print "<center><H3>El registro ha sido eliminado de la BD</H3></center>";

include 'lecturacat.php';   // Muestra la tabla actualizada sin el registro eliminado
}
else 
print "<center><H3>�Error...Ingrese el c�digo y consulte el registro a eliminar!</H3></center>";

}

elseif(isset($_POST["btnModifica"])) {
// Ingrese el c�digo del registro y pulse Modificar. Modifique los datos y pulse Grabar. Es necesario modificar la foto.
$codigo = $_POST["txtc"];
if ( $codigo != ""  )
{
// Recuperamos datos de la tabla
$consulta = "SELECT * FROM categorias WHERE id_categoria = $codigo";

$rs = mysqli_query($cn,$consulta) or die(mysql_error($cn));

    $num_rows = mysqli_num_rows($rs);
        
    if($num_rows == NULL)
    {
       // return NULL; // Vuelve a una p�gina en blanco
    echo "<center><h2>�Error. No existe el registro!</h2></center>";
    }
   else {

   $campo = mysqli_fetch_array($rs);

   $codigo = $campo[0];
   $nom_categoria = $campo[1];
}
}

}

elseif(isset($_POST["btnGraba"])) {
  // Solo graba los datos del bot�n Modificar
 //$archivo = $_FILES["archivito"]["tmp_name"]; // Nombre de arch. temporal creado en C:\xamp\tmp\PHC3.tmp
 //$tamanio = $_FILES["archivito"]["size"];     //  tama�o del archivo temporal
// $tipo    = $_FILES["archivito"]["type"];   //  tipo del archivo temporal 
 $codigo  = $_POST["txtc"];
 $nom_categoria  = $_POST["txtn"]; 
  
if ( $codigo != ""  )
   {

   //if ( $archivo != "" )
   // {
 
   // $fp = fopen($archivo, "rb");
  //  $foto = fread($fp, $tamanio);
   // $foto = addslashes($foto);
   // fclose($fp); 

  $rs=mysqli_query($cn,"UPDATE categorias SET nom_categoria='".$nom_categoria."' WHERE id_categoria=".$codigo);
	if($rs) {
	$numFilas=mysqli_affected_rows($cn);
	echo "<center><H3>".$numFilas." FILA(S) ACTUALIZADA(S)</H3></center>";
      
	} else {
		$numErr=mysqli_errno($cn);
		$descErr=mysqli_error($cn);
		echo "No se pudo actualizar el registro<br />";
		echo "N� de error: ".$numErr." * Descripci�n: ".$decErr;
	}
		
	//mysql_close($conexion);
   }

 else 
  {
   print "<center><H3>No se ha podido subir el archivo al servidor. Seleccione la foto</H3></center>";
 
  }
}

//}

elseif(isset($_POST["btnBuscar"])) {
// Busca registros por apellidos

$nom_categoria  = $_POST["txta"];

if ( $nom_categoria != ""  )
{

if (!isset($nom_categoria)){ 
echo "Debe especificar una cadena a buscar"; 
exit; 
} 

$consulta = "SELECT * FROM categorias WHERE nom_categoria LIKE '%$nom_categoria%' ORDER BY nom_categoria"; //b�squeda por cualquier caracter y completa
$rs = mysqli_query($cn,$consulta); 
if ($row = mysqli_fetch_array($rs)){ 
echo "<center><h2>RESULTADO DE BUSQUEDA</h2></center>\n"; 

echo "<table align ='center' border='5' bgcolor = '#EEFA00'>";

mysqli_field_seek($rs,0); 
while ($field = mysqli_fetch_field($rs)){ 
echo "<td><b>$field->name</b></td> \n"; 
} 
echo "</tr> \n"; 
do { 
echo "<tr> \n"; 
echo "<td>".$row[0]."</td> \n"; 
echo "<td>".$row[1]."</td> \n"; 

echo "</tr> \n"; 
} while ($row = mysqli_fetch_array($rs)); 

echo "</table> \n"; 

} else  
  echo "<center><h2>�No se ha encontrado ning�n registro!</h2></center>\n"; 
}

}


if (isset($_POST['btnPaginar'])) {

   include "paginacioncat.php";  // Lista los registros por p�gina

}


if (isset($_POST['ver'])) {

 // Manejo de la imagen. Muestra imagen seleccionada en el textarea al pulsar el bot�n Visualizar

 $fichero=$_FILES["archivito"]["tmp_name"];
 $nom=$_FILES["archivito"]["name"];

 $destino="directorio/".$nom;
 move_uploaded_file($fichero, $destino);

}


?>


<html>

<head>
<title>CATEGORIAS </title>


<script language="JavaScript" type="text/javascript"> 

function Confirmar() { 

var borrar = confirm("Desea eliminar este registro?. Mejor consulte antes"); 

return borrar; //true o false 

} 

</script> 


<style type="text/css">

.TextoFondo {
   background-color: #CCFFFF;  

}


.botonimagen{
  background-image:url(imagen/paisaje.gif);
  background-repeat:no-repeat;
  height:100px;
  width:100px;
  background-position:center;
}


</style>


</head>

<font size="8" COLOR = "#FF0000">  <marquee DIRECTION = "LEFT" BGCOLOR = "33ff99" HEIGHT = "45">GESTION DE CLIENTES</marquee></font> 
<hr>
<!-- <h1 align="center"><font face="verdana" color="blue"><b>GESTION DE CLIENTES</b></font></h1> -->
<body bgcolor="33ff99"> 
<body onload="document.getElementById('txtc').focus()">  


<form enctype="multipart/form-data" method="post" action="categorias.php">

<function reset(){
alert("javascript called");

document.getElementById("txtc").value="";
document.getElementById("txtn").value="";

} >

<!--
<script> 
   function salir(){ 
   var resp = confirm("�Esta seguro de salir?");
   if(resp == true) {
   window.open('','_self','');
   window.close() 
    }
    } 
</script>
-->

<script> 
  function salir()         //esta es la funcion en javascript que realize para salir 
  {                         // y volver a la pagina de inicio 
  document.location.href="index.php"; 
  } 
</script> 



  
<table align="center" border="5" cellspacing="6" bgcolor="#EEFA00" >

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>CODIGO:</b></font></td>
<td>&nbsp;<input type="text" id="txtc"  name="txtc" size="37%" maxsize ="37%" class="TextoFondo"  value="<?=$codigo?>" title = "Ingrese el c�digo">[El c&oacutedigo no es actualizable]</td>
<td  align="center"><b><input type="submit" name="btnPrimero" class="botonimagen"  value="PRIMERO   " title ="BOTON PRIMERO" style="color: #ff0000; background-color: #81BEF7;font-size: 17px"></b></td>
 </tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>NOMBRE CATEGORIA:</b></font></td>
<td>&nbsp;<input type="text" id="txtn"  name="txtn" size="37%" maxsize ="37%" value="<?=$nom_categoria?>"></td>
<td  align="center"><b><input type="submit" name="btnSiguiente"  class="TextoFondo"  value="SIGUIENTE" style="color: #ff0000; background-color: #81BEF7;font-size: 17px"></b></td>
</tr>

<tr>
<td colspan ="2">
<b><input type="submit" name="btnIngreso" value="INGRESO"   ></b>
<b><input type="submit" name="btnModifica" value="MODIFICAR" ></b>
<b><input type='submit' name='btnElimina' value='ELIMINAR' onClick='return Confirmar()'> </b>
<b><input type = "submit" value="NUEVO" onclick="return reset();"></b>
<b><input type="submit" name="btnGraba" value="GRABAR" title ="Actualiza registro existente"></b>

</td>
</tr>

<tr>
<td colspan="2" 
<b><input type="submit" name="btnConsulta" value="CONSULTA"></b>
<b><input type="submit" name="btnBuscar" value="BUSCAR" title ="Buscar por apellidos"></b>
<b><input type="submit" name="btnListado" value="LISTADO"></b>
<b><input type="submit" name="btnPaginar" value="PAGINACION" title ="Listar por p�ginas"></b>
<b><input name="" type="button" value="SALIR"  onclick="salir()"/></b>
</td>
</tr>

</table>
</form>

<center><h2>
<a href="MENU.HTML" > <img src='images/back.gif' border=0></a>
</h2>
</center>

</body>
</html>
