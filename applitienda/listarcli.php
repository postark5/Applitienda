<?php
$conexion=mysqli_connect("localhost", "root", "") or die("No se pudo conectar con el servidor");
mysqli_select_db($conexion, "bdgestion") or die("No se pudo conectar con la base de datos");
$result=mysqli_query($conexion, "SELECT * FROM cliente ORDER BY idcliente");
$num =mysqli_num_rows ($result);
?>
<hr>
<font size="5" color="FF0000"><center><H2>LISTADO DE CLIENTES</H2></center></font>
<center><img src="images/globo.gif" width = "75" height="75" > </center>
<br>
<br>
<table align="center" border="5" bgcolor = "#EEFA00">
<tr bgcolor="#EEFA00">
<td>C&OacuteDIGO</td>
<td>NOMBRES</td>
<td>APELLIDOS</td>
<td>CORREO</td>
<td>DIRECCION</td>
<td>CIUDAD</td>
<td>PAIS</td>
<td>TELEFONO</td>
<?php
while ($fila=mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>".$fila[0]."</td>";
echo "<td>".$fila[1]."</td>";
echo "<td>".$fila[2]. "</td>";
echo "<td>".$fila[3]. "</td>";
echo "<td>".$fila[4]."</td>";
echo "<td>".$fila[5]."</td>";
echo "<td>".$fila[6]."</td>";
echo "<td>".$fila[7]."</td>";
echo "</tr>";
}
echo "</table>";
echo "<CENTER><h3>N&uacutemero de clientes: ".$num."</h3></CENTER>";
echo "<hr>";
// mysql_close($conexion);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Clientes</title>
</head>
<body bgcolor="#EEFA00">
<center><font size="5" color="FF0000"> <li><a href="menu.html">Volver</a></li></font></center>
</body>
</html>