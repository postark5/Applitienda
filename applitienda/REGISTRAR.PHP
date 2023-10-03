<?php
$cn = mysqli_connect ("localhost","root","");
mysqli_select_db($cn,"bdgestion");
// si se envio el formulario
if ( !empty($_POST['submit']) ) {
 // definimos las variables
 if ( !empty($_POST['usuario']) )
    $usuario = $_POST['usuario'];
 if ( !empty($_POST['password']) )
    $password = $_POST['password'];
 if ( !empty($_POST['re-password']) )
    $rePassword = $_POST['re-password'];
 if ( !empty($_POST['email']) )
    $email = $_POST['email'];
 // completamos la variable error si es necesario
 if ( empty($usuario) )
    $error['usuario'] = 'Es obligatorio completar el nombre de usuario';
 if ( empty($password) )
    $error['password'] = 'Es obligatorio completar la contraseña';
 if ( empty($email) )
    $error['email'] = 'Es obligatorio completar el email';
 if ( $_POST['password'] != $_POST['re-password'] ) 
    $error['re-password'] = 'La contrase&ntilde;a no coincide';
 // si no hay errores registramos al usuario
 if ( empty($error) ) {
    // inserto los datos de registro en la db
    $query  = "INSERT INTO `usuarios` (usuario,password,email)
         VALUES ('$usuario','".md5($password)."','$email')";
    $result = mysqli_query($cn,$query);
    echo "<center><H1>El usuario se ha registrado correctamente.</H1></center>\n";
 }
}
?>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registro de Usuario</title>
</head>
<body>
<body bgcolor="33ff99">
<font size="6" color="FF0000"><center><h3>REGISTRO DE USUARIO</h3></center></font>
<HR>
<?php if (!empty($error)) { ?>
 <ul>
 <?php foreach ($error as $mensaje) { ?>
 <li><?= $mensaje ?></li>
 <?php } ?>
 </ul>
<?php } ?>
<table align="center" border="5" cellspacing="6" width = "300" bgcolor="#EEFA00">
<tr>
<td colspan ="2">
<form action="registrar.php" method="post">
<p>
<label for="usuario">Nombre de usuario</label><br />
<input name="usuario" type="text"
  value="<?php if ( ! empty($usuario) ) echo $usuario; ?>" />
</p>
<p>
<label for="password">Contrase&ntilde;a</label><br />
<input name="password" type="password"
   value="<?php if ( ! empty($password) ) echo $password; ?>" />
</p>
<p>
<label for="re-password">Repetir Contrase&ntilde;a</label><br />
<input name="re-password" type="password"
   value="<?php if ( ! empty($rePassword) ) echo $rePassword; ?>" />
</p>
<p>
<label for="email">Correo Electr&oacute;nico</label><br />
<input name="email" type="text"
  value="<?php if ( ! empty($email) ) echo $email; ?>" />
</p>
<p>
<input name="submit" type="submit" value="Registrar" />
</p>
</form>
<center><h2>
<a href="index.php">Volver</a>
</td>
</tr>
</table>
</body>
</html>
