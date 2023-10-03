<?php
$conexion=mysqli_connect("localhost","root","") or die("No se pudo conectar con el servidor");
mysqli_select_db($conexion,"bdgestion") or die("No se pudo conectar con la base de datos");
$result=mysqli_query($conexion,"SELECT * FROM categorias ORDER BY id_categoria");
$num=mysqli_num_rows($result);
?>

<hr>
<CENTER><h2>Listado de categorias</h2></CENTER>
<table align = "center" border="5" bgcolor ="#EEFA00">
    <tr bgcolor="#EEFA00">
        <td>C&OacuteDIGO</td>
        <td>CATEGORIA</td>
    </tr>
<?php
while ($fila=mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>".$fila[0]."</td>";
    echo "<td>".$fila[1]."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<CENTER><h3>N&uacutemero de categorias: ".$num."</h3></CENTER>";
echo "<hr>";
?>