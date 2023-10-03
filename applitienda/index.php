<?php
$cn = mysqli_connect ("localhost","root","");
mysqli_select_db($cn,"bdgestion");
if ( isset($_POST['btnLogin']) ) {
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$xclave =MD5($password); // la funci�n MD5() encripta el servidor
$sql ="select * from usuarios where usuario ='$usuario' and password='$xclave'";
$rs = mysqli_query($cn,$sql);
$nreg = mysqli_num_rows($rs);
$campo = mysqli_fetch_array($rs);
$tipo = $campo[4];
if($nreg != 0 and $tipo =='admin')	
    {
     header( 'Location: menu.html' );
    }
elseif($nreg != 0 and $tipo =='comun')
    {
     header( 'Location: ingreso.php' );
    }
     else
    {
    echo '<center><h3>El nombre de usuario o contrase&ntilde;a no coinciden</h3></center>';
    }
}
?>
<html>
<body>
<body bgcolor="33ff99"> 
<font size="15" COLOR = "#FF0000">  <marquee DIRECTION = "LEFT" BGCOLOR = "33ff99"
 HEIGHT = "50" behavior="alternate">LA TIENDA VIRTUAL</marquee></font>
<br><br>
<table  border="5" align="center" bgcolor ="#EEFA00">
<tr>
<td colspan ="2">
<?php include("alfa_titulo.html")?>
</td>
</tr>
</table>
<form name="formu" action="index.php" method="post">
<function reset(){
alert("javascript called");
document.getElementById("usuario").value="";
document.getElementById("password").value="";
} >
<br>
<table  border="5" cellpadding="6" cellspacing="6" align="center" bgcolor ="#EEFA00">
 <tr>
  <td bgcolor="#CCCCCC" align="center" colspan="2">
   <b>LOGIN</b>
  </td>
 </tr>
 <tr>
  <td align="right">
   <font face="verdana" color="red"><b>USUARIO:</b></font>&nbsp;
  </td>
  <td align="left">
   <input type="text" maxlength="20" name="usuario" id = "usuario" autocomplete="off"
    value="">&nbsp;
  </td>
 </tr>
 <tr>
  <td align="right">
   &nbsp;<font face="verdana" color="red"><b>PASSWORD:</b></font>&nbsp;
  </td>
  <td align="left">
   <input type="password" maxlength="10" name="password"  id ="password" autocomplete="off"
    value="">&nbsp;
  </td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <input type="submit" NAME ="btnLogin"  value="L O G I N">
  </td>
 </tr>
 <tr>
  <td colspan="2" align="center">
   <input type="submit" NAME ="btnNuevo"  value="CLEAR"  onclick="return reset();">
  </td>
 </tr>
 <tr>
  <td align="center" colspan="2">
   &nbsp;No estas registrado? <a href="registrar.php"><font color="#000000"><b>REGISTRATE</b>
   </font></a>&nbsp;
  </td>
 </tr>
 <tr>
  <td align="center" colspan="2">
   <span class="twitter"><a href="ContactForm1/index.php"><em><font size ="5" color = "red">
    Cont&aacute;ctenos</font></em></a></span> 
  </td>
 </tr>
</table>
<br><br>
<?php require("alfa_pie.html")?>
</form>
</body>
</html>
