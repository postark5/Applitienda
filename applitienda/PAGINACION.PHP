<?php
	
define("PagTam",5);  // Se recomienda paginar cada 10 registros
		
if(isset($_GET['pag']))
	$pag = $_GET['pag'];
else 
	$pag = 1;

$inicio = ($pag-1) * PagTam;

$conexion=new mysqli("localhost","root","","bdgestion");  // mysqli es una clase

$todos = 'select count(*) as num from cliente';
$result = $conexion->query($todos);
$fila = $result->fetch_assoc();
$numRegistros = $fila['num'];

$numPags=ceil($numRegistros/PagTam);

$sql="select idcliente,nombres,apellidos,email,direccion,ciudad,pais,telefono from cliente LIMIT ". $inicio.",".PagTam;
$result = $conexion->query($sql);

?>

<html>
<head><title>Paginacion</title></head>
<body>

<font size="10" color="FF0000"><center><h2>Paginaci&oacuten de Clientes</h2></center></font>

<?php

 // $num_rows = mysql_num_rows($result);
        
  if($numRegistros == 0)
    {
       // return NULL;  // Vuelve a una página en blanco
     echo "<center><h2>¡Error. No existen registros!</h2></center>";
    }

  else
{


$campos = $result->fetch_fields();

// echo "<font size="10" color="FF0000"><center><h2>Paginaci&oacuten de Clientes</h2></center></font>";
			
echo '<table align="center" border="5" cellspacing="6" bgcolor="#EEFA00"><tr bgcolor = ”#EEFA00”>';

 // <tr bgcolor = ”#EEFA00”>
echo "<td>Codigo</td>";
echo "<td>Nombres</td>";
echo "<td>Apellidos</td>";
echo "<td>Correo</td>";
echo "<td>Direccion</td>";
echo "<td>Ciudad</td>";
echo "<td>Pais</td>";
echo "<td>Telefono</td>";

echo '</tr>';

while ($fila = $result->fetch_row()) 
{
	echo '<tr>';
    for($i = 0; $i < count($campos); $i++)
    {
    	echo '<td>'.$fila[$i].'</td>';		
    }
	echo '</tr>';
}
echo '</table>';

echo '<div class="content-paginacion">';
echo "<center><h2>";
echo '<a href="clientes.php">Volver</a>'; 

if( $numPags > 1)

{
 // echo "<center><h2>";
echo '<div class = "paginas"> Pag: '.$pag.' De '.$numPags.
' <a href="paginacion.php?pag=1"> Inicio </a>';
			
 for($x = 1; $x <= $numPags; $x++)
    {
     if( $pag == $x )
       echo '<a href="paginacion.php?pag='.$x.'" class= "pag-Actual">['.$x.'] </a> ';
     else 
       echo '<a href="paginacion.php?pag='.$x.'">['.$x.'] </a> ';
    }
  echo ' <a href="paginacion.php?pag='.$numPags.'"> final </a></div> ';

   //  echo '<a href="clientes.php">Volver</a></div>'; 

}
else
    echo '<div class= "paginas" >Pag: 1/1</div> ';
    echo "</h2></center>";

}
	
  ?>
    
</body>
</html>