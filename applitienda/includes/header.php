<?php
//Captutamos las variables de sesion y lo almacenamos en variables.
//$items=$_SESSION['items'];
//$total=number_format($_SESSION['total'],2);

$items="0";
$total="0.00";

//Si no llega ningun valor, inicializamos las variables en 0 y 0.00 respectivamente
if (!$items) $items="0";
if (!$total) $total="0.00";
?>
<table width=100% border=0 cellspacing = 0 bgcolor=#cccccc>
 
<tr>
  
  <td rowspan = 2>
  	<a href = "index.php"><img src="images/arbol1.gif"  border=10
       align=left valign=bottom height = 80 width = 247></a>
  </td>
  <td rowspan ="2" align="center" size ="20" ><font color ="ff0000"><h2> ALFA S.A.C. - ARTICULOS ONLINE</h2></font> </td>
   
  <td align = right valign = bottom>
	<?php
	//Mostramos la cantidad de items en el carrito
	//echo "Total Items=". $items;
	?>
  </td>
  
  <td align = right rowspan = 2 width = 135>
	<a href="ver_carrito.php?<?php echo SID; ?>">
		<img src="images/CARRITO_DE_COMPRAS.gif" width="135" border="0"/>
	</a> 
  </td>
 
</tr>
  
<tr>
   
  <td align = right valign = top>	
	<?php
	//Mostramos el total a pagar por el usuario.
	//echo "Total S/." . $total;
	?>
  </td>
  
</tr>

</table>