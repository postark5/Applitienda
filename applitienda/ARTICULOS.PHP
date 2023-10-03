<?php
// Definir variables
$cod="";
$titulo="";
$descripcion ="";
$precio ="";
$stock = "";
$catid = "";
$imagen = "";
//require("conectando.php");  // No es aplicable para mostrar una imagen o foto
// Para la conexión se considera mayúsculas o minúsculas en los nombres.
 $cn = mysqli_connect("localhost","root","") or die("NO SE PUDO CONECTAR CON EL SERVIDOR");
 mysqli_select_db($cn,"bdgestion") or die("¡NO SE PUDO CONECTAR CON LA BASE DE DATOS. POR FAVOR CREAR LA BASE DE DATOS Y TABLAS!");

 if (isset($_POST["btnPrimero"])) 
{

  $n = 0;
    $rs=mysqli_query($cn,"select * from articulo order by idarticulo") or die("Could not perform select query - " . mysql_error());;

    $num_rows = mysqli_num_rows($rs);
        
  if($num_rows == NULL)
    {
       // return NULL;  // Vuelve a una página en blanco
     echo "<center><h2>¡Error. No existen registros!</h2></center>";
    }

  else

 {
   mysqli_data_seek($rs,$n);
   $campo=mysqli_fetch_array($rs);

   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}
}

elseif(isset($_POST["btnAnterior"])) {

 $cod=$_POST["txtcod"];  

 $consulta = "SELECT * FROM articulo WHERE idarticulo < '$cod' ORDER BY idarticulo DESC LIMIT 0,1";

 $rs = mysqli_query($cn,$consulta);

$campo = mysqli_fetch_array($rs);
   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}

elseif(isset($_POST["btnSiguiente"])) {

 $cod=$_POST["txtcod"]; 

$consulta = "SELECT * FROM articulo WHERE idarticulo > '$cod' ORDER BY idarticulo LIMIT 0,1";

$rs = mysqli_query($cn,$consulta);

$campo = mysqli_fetch_array($rs);
   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}

elseif(isset($_POST["btnUltimo"])) {

  $rs=mysqli_query($cn,"select * from articulo order by idarticulo");

    $num_rows = mysqli_num_rows($rs);
        
    if($num_rows == NULL)
    {
       // return NULL; // Vuelve a una página en blanco
    echo "<center><h2>¡Error. No existen registros!</h2></center>";
    }

else

{

$last_row = mysqli_num_rows($rs) - 1;
mysqli_data_seek($rs, $last_row);

$campo=mysqli_fetch_array($rs);

   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}
}

elseif(isset($_POST["btnConsulta"])) {

$cod = $_POST["txtcod"];
if ( $cod != ""  )
{
// Recuperamos datos de la tabla
$consulta = "SELECT * FROM articulo WHERE idarticulo = '$cod'";  // El código es cadena

$rs = mysqli_query($cn,$consulta) or die(mysql_error($cn));

$campo = mysqli_fetch_array($rs);

   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}

}

elseif(isset($_POST["btnIngreso"])) {

 $cod  = $_POST["txtcod"];
 $titulo  = $_POST["txttitulo"]; 
 $descripcion  = $_POST["txtdescripcion"];
 $precio  = $_POST["txtprecio"];
 $stock = $_POST["txtstock"];
 $catid  = $_POST["txtcatid"];
 $imagen  = $_POST["txtimagen"]; 

 $consulta = "select * from articulo where idarticulo = '$cod'";
 $rs = mysqli_query($cn,$consulta);
 $n = mysqli_num_rows($rs);
 if ($n > 0){
	echo "<center><h2>El coódigo ya existe,ingrese otro registro</h2></center>";
 }
 
 else {

 if ($cod != "")
 {

     $qry = "INSERT INTO articulo VALUES 
            ('$cod','$titulo','$descripcion','$precio','$stock','$catid','$imagen')";

    mysqli_query($cn,$qry);

    if(mysqli_affected_rows($cn) > 0) {
       echo "<center><h2>Se ha guardado el registro en la base de datos.</h2></center>";
     }
    else
     {
       echo "<center><h2>NO se ha podido guardar el registro en la base de datos. !El código ya existe¡</h2></center>";
     }
  
 }
 else
   {
    echo "<center><h2>Complete los datos</h2></center>";
  }
}
}

elseif(isset($_POST["btnListado"])) {

include 'leer.php'; 

}

elseif(isset($_POST["btnElimina"])) {

$cod=$_POST["txtcod"];
if ( $cod != "")
{

//Creamos la sentencia SQL y la ejecutamos
$consulta="Delete From articulo Where idarticulo='$cod'";

mysqli_query($cn,$consulta);
print "<center><H3>El registro ha sido eliminado de la BD</H3></center>";

include 'leer.php';
}
else 
print "<center><H3>¡Error...Ingrese el código y consulte el registro a eliminar!</H3></center>";

}

elseif(isset($_POST["btnModifica"])) {
$cod = $_POST["txtcod"];
if ( $cod != ""  )
{
// Recuperamos datos de la tabla
$consulta = "SELECT * FROM articulo WHERE idarticulo = '$cod'";

$rs = mysqli_query($cn,$consulta) or die(mysql_error($cn));

$campo = mysqli_fetch_array($rs);

   $cod = $campo[0];
   $titulo = $campo[1];
   $descripcion = $campo[2];
   $precio = $campo[3];
   $stock = $campo[4];
   $catid = $campo[5];
   $imagen = $campo[6];
}

}

elseif(isset($_POST["btnGraba"])) {

 $cod  = $_POST["txtcod"];
 $titulo  = $_POST["txttitulo"]; 
 $descripcion  = $_POST["txtdescripcion"];
 $precio  = $_POST["txtprecio"];
 $stock = $_POST["txtstock"];
 $catid  = $_POST["txtcatid"];
 $imagen  = $_POST["txtimagen"]; 

if ( $cod != ""  )
   {

$consulta  = "UPDATE `articulo` set titulo = '$titulo', descripcion = '$descripcion', precio = $precio, stock = $stock, id_categoria = $catid,imagen='$imagen' WHERE idarticulo = '$cod'";

$rs=mysqli_query($cn,$consulta);

	if($rs) {
	$numFilas=mysqli_affected_rows($cn);
	echo "<center><H3>".$numFilas." FILA(S) ACTUALIZADA(S)</H3></center>";
   	} else {
		$numErr=mysqli_errno($cn);
		$descErr=mysqli_error($cn);
		echo "No se pudo actualizar el registro<br />";
		echo "Nº de error: ".$numErr."";  
        }
		
	//mysql_close($conexion);
   }

}

elseif(isset($_POST["btnBuscar"])) {

$titulo  = $_POST["txttitulo"];

if ( $titulo != ""  )
{

if (!isset($titulo)){ 
echo "Debe especificar una cadena a buscar"; 
exit; 
} 

$consulta = "SELECT * FROM articulo WHERE titulo LIKE '%$titulo%' ORDER BY titulo"; //búsqueda por cualquier caracter y completa
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
echo "<td>".$row[2]."</td> \n"; 
echo "<td>".$row[3]."</td> \n"; 
echo "<td>".$row[4]."</td> \n"; 
echo "<td>".$row[5]."</td> \n"; 
echo "<td>".$row[6]."</td> \n"; 

echo "</tr> \n"; 
} while ($row = mysqli_fetch_array($rs)); 

echo "</table> \n"; 

} else  
  echo "<center><h2>¡No se ha encontrado ningún registro!</h2></center>\n"; 
}

}
?>

<html>
<head>
<title>ARTICULOS </title>

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
<font size="8" COLOR = "#FF0000">  <marquee DIRECTION = "LEFT" BGCOLOR = "33ff99" HEIGHT = "45">GESTION DE ARTICULOS</marquee></font> 
<hr>

<!-- <h1 align="center"><font face="verdana" color="blue"><b>GESTION DE ARTICULOS</b></font></h1> -->
<body bgcolor="33ff99"> 
<body onload="document.getElementById('txtcod').focus()">  

<form enctype="multipart/form-data" method="post" action="articulos.php">

<function reset(){
alert("javascript called");

document.getElementById("txtcod").value="";
document.getElementById("txttitulo").value="";
document.getElementById("txtdescripcion").value="";
document.getElementById("txtprecio").value="";
document.getElementById("txtstock").value="";
document.getElementById("txtcatid").value="";
document.getElementById("txtimagen").value="";

} >

<!--
<script> 
   function salir(){ 
   var resp = confirm("¿Esta seguro de salir?");
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
<td>&nbsp;<input type="text" id="txtcod"  name="txtcod" size="37%" maxsize ="37%" class="TextoFondo"  value="<?=$cod?>" title = "Ingrese el código">[El c&oacutedigo no es actualizable]</td> 
<td  align="center"><b><input type="submit" name="btnPrimero" class="botonimagen"  value="PRIMERO   " title ="BOTON PRIMERO" style="color: #ff0000; background-color: #81BEF7;font-size: 17px"></b></td>
</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>TITULO:</b></font></td>
<td>&nbsp;<input type="text" id="txttitulo"  name="txttitulo" size="37%" maxsize ="37%" value="<?=$titulo?>"></td>
<td  align="center"><b><input type="submit" name="btnSiguiente"  class="TextoFondo"  value="SIGUIENTE" style="color: #ff0000; background-color: #81BEF7;font-size: 17px"></b></td>
</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>DESCRIPCION:</b></font></td>
<td>&nbsp;<input type="text" id="txtdescripcion"  name="txtdescripcion" size="37%" maxsize ="37%" value="<?=$descripcion?>"></td>
<td  align="center"><b><input type="submit" name="btnAnterior" class="TextoFondo"  value="ANTERIOR " style="color: #ff0000; background-color: #81BEF7;font-size: 17px"></b></td>
</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>PRECIO:</b></font></td>
<td>&nbsp;<input type="text" id="txtprecio"  name="txtprecio" size="37%" maxsize ="37%" value="<?=$precio?>"></td>
<td  align="center"><b><input type="submit" name="btnUltimo" class="TextoFondo"  value="   ULTIMO  " style="color: #ff0000; background-color: #81BEF7;font-size: 17px" ></b></td>
</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>STOCK:</b></font></td>
<td>&nbsp;<input type="text" id="txtstock"  name="txtstock" size="37%" maxsize ="37%" value="<?=$stock?>"></td>

</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>CATEGORIA:</b></font></td>
<td>&nbsp;<input type="text" id="txtcatid"  name="txtcatid" size="37%" maxsize ="37%" value="<?=$catid?>">[El c&oacutedigo de categoria]</td>

</tr>

<tr>
<td align="right" width=""><font face="verdana" color="red"><b>RUTA:</b></font></td>
<td>&nbsp;<input type="text" id="txtimagen"  name="txtimagen" size="37%" maxsize ="37%" value="<?=$imagen?>">[La carpeta images y el archivo de imagen]</td>

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
<b><input type="submit" name="btnBuscar" value="BUSCAR" title ="Buscar por titulo"></b>
<b><input type="submit" name="btnListado" value="LISTADO"></b>
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
