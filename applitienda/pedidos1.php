<?php
session_start();
?>
<html>
    <head>
        <title>Ingreso a la tienda</title>
            <link href="css/estilos.css" type="txt/css" rel="stylesheet">
    </head>
    <body>
    <?php include('includes/header.php'); ?>
    <h2>Bienvenido a los Articulos Online</h2>
    <p>Por favor elija una categor&iacutea: </p>
    <?php
    require_once 'class/Catalogo.php';
    require_once 'class/Generales.php';
    $obj=new Catalogo();
    $cat_array=$obj->get_categorias();
    if (!is_array($cat_array))
    {
        echo  "No hay categorias actualmente  disponibles<br>";
        exit;
    }
    echo"<ul>";
    foreach ($cat_array as $cat)
    {
        $url="articulos_cat.php?idcat=".$cat['id_categoria'];
        $title=$cat['nom_categoria'];
        echo "<li>";
        Generales::do_html_URL($url,$title);
    }
    echo "</ul>";
    echo "<hr>";
    ?>

    <center>
        <h2>
            <a href="MENU.html"><img src='images/back.gif' border=0></a>
        </h2>
    </center>
    </body>
</html>