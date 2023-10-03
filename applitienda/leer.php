<?php
$conexion=mysqli_connect("localhost","root","") or die("No se pudo conectar con el servidor");
mysqli_select_db($conexion,"bdgestion") or die("No se pudo conectar con la base de datos");
$result=mysqli_query($conexion,"SELECT * FROM articulo ORDER BY idarticulo");
$num=mysqli_num_rows($result);
?>
<hr>
<CENTER><h2>Listado de articulos</h2></CENTER>
<table align="center" border="5" bgcolor="#EEFA00">
    <tr bgcolor="#EEFA00">
        <td>C&OacuteDIGO</td>
        <td>TITULO</td>
        <td>DESCRIPCION</td>
        <td>PRECIO</td>
        <td>STOCK</td>
        <td>CATEGORIA</td>
        <td>RUTA</td>
    </tr>
<?php
while($fila=mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>".$fila[0]."</td>";
    echo "<td>".$fila[1]."</td>";
    echo "<td>".$fila[2]."</td>";
    echo "<td>".$fila[3]."</td>";
    echo "<td>".$fila[4]."</td>";
    echo "<td>".$fila[5]."</td>";
    echo "<td>".$fila[6]."</td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "<CENTER><h3>N&uacutemero de articulos: ".$num."</h3></CENTER>";
    echo "<hr>";
?>