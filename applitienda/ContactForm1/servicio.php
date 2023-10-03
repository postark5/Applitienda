<?php
$servicio = $_POST["servicio"];

switch ($servicio){
	case "ho":
		header("location:http://www.hotmail.com");
		break;
	case "ya":
		header("location:http://www.yahoo.com");
		break;
	case "gm":
		header("location:http://www.gmail.com");
		break;

}
?>