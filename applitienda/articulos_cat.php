<?php
session_start();
require_once 'class/Catalogo.php';
require_once 'class/Generales.php';
$obj= new Catalogo();
$idcat=$_GET['idcat'];
$nom_cat=$obj->get_nombre_cat($idcat);
?>

<html>
<head>
<title>Seleccion de Articulos</title>
<link href="css/estilos.css" type="text/css" rel="stylesheet"> 
</head>
<body>
<?php include('includes/header.php'); ?>
<h2><?php echo $nom_cat; ?></h2>
<p>Por favor elija un art&iacuteculo:</p>
<?php
$articulo_array=$obj->get_articulos_cat($idcat);
if (is_array($articulo_array) && count($articulo_array)>0)
{
?>
<table width="100%">
<?php
foreach ($articulo_array as $row)
{
$url="detalles_articulo.php?idarticulo=". $row['idarticulo'];
?>
<tr>
<td width="100">
<a href="<?php echo $url; ?>">
<img src="<?php echo $row['imagen']; ?>" border="0">
</a>
</td>
<td>
<?php
$title= $row['titulo'];
Generales::do_html_URL($url, $title);
?> 
</td> 
</tr>
<?php
        }
}
else
{
echo "<strong>No Hay Articulos para esta categor&iacutea.</strong><br><br>"; echo "<a href='ingreso.php'>
<img src='images/back.gif' border=0>
</a>";
exit;
}
?>
</table>
<hr>
<br>
<center><B>[PULSE EL BOTON VOLVER PARA SELECCIONAR OTRA CATEGORIA]</B></center>
<HR>
<center><h2>
<a href="ingreso.php"><img src='images/back.gif' border=0></a>
</h2>
</center>
</body>
</html>