<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
       <meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
       <title>IESTP MAC - CONTACTO</title>
       
       <!-- the cascading style sheet-->
       <link href="style.css" rel="stylesheet" type="text/css" />

<script language="JavaScript1.2">
/*
Protección General del sitio Web, RatNET Software, DPWS® 1.0
Este panel de control DPWS® 1.0 es de uso exclusivo para los sitios Web
diseńados por Full Vision y/o RatNET Software, copyright® 2000 ~ 2005.
DPWS® 1.0 (Dinamic Portal Web Systems) y RatNET
son marcas registradas de Full Vision Entorno Multimedia 23 C.A. 
*/
//Evita usar el boton derecho del ratón
document.oncontextmenu = function(){return false}
//No permite seleccionar el contenido de una página 
function disableselect(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
//Borra el Portapapeles con el uso del teclado
if (document.layers)
document.captureEvents(Event.KEYPRESS)
function backhome(e){
window.clipboardData.clearData();
}
//Borra el Portapapeles con el uso del mouse
document.onkeydown=backhome
function click(){
if(event.button){
window.clipboardData.clearData();
}
}
document.onmousedown=click
//-->
</script>
<style type="text/css" media="print">
<!--
img { visibility:hidden }
-->
</style>


     
</head>
  

<body>

<!-- Protección del código fuente -->
<body onMouseOut="window.clipboardData.clearData(); return false" onMouseOver="window.clipboardData.clearData(); return false">

<body bgcolor = "#00ff00">

<hr />



 <center>  <img src="images/globo.gif" width ="90" height="90" alt="Box" class="box" /></center>
<!--<center>

<iframe width="160" height="130" src="../parpadeo1.htm" scrolling="no" frameborder="0" ></iframe>
</center>
-->
 <!--	<center>  <img src="images/logomac.jpg" width ="165" height="160" alt="Box" class="box" /></center> -->

<!--	  <h1 class="logo"><a href="">ISTP<em> MAC</em></a></h1> -->
<!--	  <p class="author"><a href="http://www.engeles.net76.net">Por D Caro</a> <br /> -->
<br> 

<!--<img src="images/casa.gif" width ="25" height="25" alt="Box" class="box" />-->

 <!-- <span class="twitter"><a href="/index.php">Ir al <em>Inicio</em></a></span>&nbsp;&nbsp;&nbsp;-->

<br>

<font size="10" COLOR = "#FF0000">  <marquee DIRECTION = "LEFT" BGCOLOR = "#EEFA00" HEIGHT = "50" behavior="ALTERNATE">CONTACTENOS ALFA SAC</marquee></font> 

<center><font color="#000080"><H3>Escriba sus comentarios o sugerencias al email <em>dcaro125@hotmail.com</em> o mediante el formulario. </H3> </font></center> 

    
<center><font color="#FF0000"><H3><B>Elija su Servicio de Correo</B>
<FORM ACTION="servicio.php" METHOD="POST">
<SELECT NAME="servicio">
	<OPTION VALUE = "ho">HOTMAIL.COM</OPTION>
	<OPTION VALUE = "ya">YAHOO.COM</OPTION>
	<OPTION VALUE = "gm">GMAIL.COM</OPTION>

	</SELECT>
	<INPUT TYPE="submit" VALUE="Enviar Consulta" >
</FORM>
</H3> </font></center>
<center><font size="5" color="FF0000"><li><a href="../index.php">Volver</a></li></font></center>

 <div id="contentForm">


            <!-- The contact form starts from here-->
            <?php
                 $error    = ''; // error message
                 $name     = ''; // sender's name
                 $email    = ''; // sender's email address
				 $telef    = ''; // sender's telef
                 $subject  = ''; // subject
                 $message  = ''; // the message itself
               	 $spamcheck = ''; // Spam check

            if(isset($_POST['send']))
            {
                 $name     = $_POST['name'];
                 $email    = $_POST['email'];
				 $telef    = $_POST['telef'];
                 $subject  = $_POST['subject'];
                 $message  = $_POST['message'];
               	 $spamcheck = $_POST['spamcheck'];

                if(trim($name) == '')
                {
                    $error = '<div class="errormsg">Por favor escriba su nombre!</div>';
                }
            	    else if(trim($email) == '')
                {
                    $error = '<div class="errormsg">POr favor indique su direccion Email!</div>';
                }
                else if(!isEmail($email))
                {
                    $error = '<div class="errormsg">Su Email no es valido, por favor intente de nuevo!!</div>';
                }
            	    if(trim($subject) == '')
                {
                    $error = '<div class="errormsg">Indique el asunto del mensaje!</div>';
                }
            	else if(trim($message) == '')
                {
                    $error = '<div class="errormsg">Escriba su mensaje!</div>';
                }
	          	else if(trim($spamcheck) == '')
	            {
	            	$error = '<div class="errormsg">REalice la suma para controlar el Spam!</div>';
	            }
	          	else if(trim($spamcheck) != '5')
	            {
	            	$error = '<div class="errormsg">Control Spam: El resultado de la suma no es correcta! 2 + 3 = ???</div>';
	            }
                if($error == '')
                {
                    if(get_magic_quotes_gpc())
                    {
                        $message = stripslashes($message);
                    }

                    // the email will be sent here
                    // make sure to change this to be your e-mail
                    $to      = "eacd9876@hotmail.com";

                    // the email subject
                    // '[Contact Form] :' will appear automatically in the subject.
                    // You can change it as you want

                    $subject = '[Contacto web] : ' . $subject;

                    // the mail message ( add any additional information if you want )
                    $msg     = "From : $name \r\ne-Mail : $email \r\nSubject : $subject \r\n\n" . "Message : \r\n$message";

                    mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n");
            ?>

                  <!-- Message sent! (change the text below as you wish)-->
                  <div style="text-align:center;">
                    <h1>Enviado</h1>
                       <p>Gracias <b><?=$name;?></b>, le responderemos lo antes posible!</p>
                  </div>
                  <!--End Message Sent-->


            <?php
                }
            }

            if(!isset($_POST['send']) || $error != '')
            {
            ?>





            <font color="FF0000"><h1>CONTACTENOS:</h1></font>
  <!--Error Message-->
            <?=$error;?>


            <form  method="post" name="contFrm" id="contFrm" action="">


                      <label><span class="required">*</span> Nombres y Apellidos:</label>
            			<input name="name" type="text" class="box" id="name" size="50" value="<?=$name;?>" />

            			<label><span class="required">*</span> Email: </label>
            			<input name="email" type="text" class="box" id="email" size="50" value="<?=$email;?>" />

                                <label><span class="required">*</span> Tel&eacutefono: </label>
            			<input name="telef" type="text" class="box" id="telef" size="50" value="<?=$telef;?>" />


            			<label><span class="required">*</span> Asunto: </label>
            			<input name="subject" type="text" class="box" id="subject" size="50" value="<?=$subject;?>" />
                                <label><span class="required">*</span> Pa&iacutes: </label>

<select name="txtpais" size="1" id="txtpais" style="border-style:solid; border-width:1px; border-color:#748587; background-color:#e9e5db; font-family:verdana; font-size:11px">
                <option>---&gt; Pais &lt;---</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania </option>
                <option value="Algeria">Algeria </option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra </option>
                <option value="Angola">Angola </option>
                <option value="Anguilla">Anguilla </option>
                <option value="Antarctica">Antarctica </option>
                <option value="Antigua and Barbuda">Antigua and Barbuda </option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia </option>
                <option value="Aruba">Aruba </option>
                <option value="Australia">Australia </option>
                <option value="Austria">Austria </option>
                <option value="Azerbaijan">Azerbaijan </option>
                <option value="Bahamas">Bahamas </option>
                <option value="Bahrain">Bahrain </option>
                <option value="Barbados">Barbados </option>
                <option value="Belarus">Belarus </option>
                <option value="Belgium">Belgium </option>
                <option value="Belize">Belize </option>
                <option value="Benin">Benin </option>
                <option value="Bermuda">Bermuda </option>
                <option value="Bhutan">Bhutan </option>
                <option value="Bolivia">Bolivia </option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina </option>
                <option value="Botswana">Botswana </option>
                <option value="Bouvet Island">Bouvet Island </option>
                <option value="Brasil">Brasil </option>
                <option value="Brunei Darussalam">Brunei Darussalam </option>
                <option value="Bulgaria">Bulgaria </option>
                <option value="Burkina Faso">Burkina Faso </option>
                <option value="Burma">Burma </option>
                <option value="Burundi">Burundi </option>
                <option value="Cambodia">Cambodia </option>
                <option value="Cameroon">Cameroon </option>
                <option value="Canada">Canada </option>
                <option value="Cape Verde">Cape Verde </option>
                <option value="Cayman Islands">Cayman Islands </option>
                <option value="Central African Republic">Central African Republic </option>
                <option value="Chad">Chad </option>
                <option value="Chile">Chile </option>
                <option value="China">China </option>
                <option value="Christmas Island">Christmas Island </option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands </option>
                <option value="Colombia">Colombia </option>
                <option value="Comoros">Comoros </option>
                <option value="Congo">Congo </option>
                <option value="Cook Islands">Cook Islands </option>
                <option value="Costa Rica">Costa Rica </option>
                <option value="Cote D'Ivoire">Cote D'Ivoire </option>
                <option value="Croatia">Croatia </option>
                <option value="Cuba">Cuba </option>
                <option value="Cyprus">Cyprus </option>
                <option value="Czech Republic">Czech Republic </option>
                <option value="Czechoslovakia">Czechoslovakia </option>
                <option value="Denmark">Denmark </option>
                <option value="Djibouti">Djibouti </option>
                <option value="Dominica">Dominica </option>
                <option value="Dominican Republic">Dominican Republic </option>
                <option value="East Timor">East Timor </option>
                <option value="Ecuador">Ecuador </option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador </option>
                <option value="Equatorial Guinea">Equatorial Guinea </option>
                <option value="Eritrea">Eritrea </option>
                <option value="Estonia">Estonia </option>
                <option value="Ethiopia">Ethiopia </option>
                <option value="Faroe Islands">Faroe Islands </option>
                <option value="Fiji">Fiji </option>
                <option value="Finland">Finland </option>
                <option value="France, Metropolitan">France, Metropolitan </option>
                <option value="French Polynesia">French Polynesia </option>
                <option value="French Republic">French Republic </option>
                <option value="Gabonese Republic">Gabonese Republic </option>
                <option value="Gambia">Gambia </option>
                <option value="Gaza">Gaza </option>
                <option value="Georgia">Georgia </option>
                <option value="Germany">Germany </option>
                <option value="Ghana">Ghana </option>
                <option value="Gibraltar">Gibraltar </option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greenland">Greenland </option>
                <option value="Grenada">Grenada </option>
                <option value="Guadeloupe">Guadeloupe </option>
                <option value="Guam">Guam </option>
                <option value="Guatemala">Guatemala </option>
                <option value="Guiana">Guiana </option>
                <option value="Guinea">Guinea </option>
                <option value="Guinea-Bissau">Guinea-Bissau </option>
                <option value="Guyana">Guyana </option>
                <option value="Haiti">Haiti </option>
                <option value="Held Territories">Held Territories </option>
                <option value="Hellenic Republic">Hellenic Republic </option>
                <option value="Honduras">Honduras </option>
                <option value="Hong Kong">Hong Kong </option>
                <option value="Hungary">Hungary </option>
                <option value="Iceland">Iceland </option>
                <option value="India">India </option>
                <option value="Indian Ocean Islands">Indian Ocean Islands </option>
                <option value="Indonesia">Indonesia </option>
                <option value="Iraq">Iraq </option>
                <option value="Ireland">Ireland </option>
                <option value="Islamic Iran">Islamic Iran </option>
                <option value="Islas Malvinas">Islas Malvinas</option>
                <option value="Italian Republic">Italian Republic </option>
                <option value="Jamaica">Jamaica </option>
                <option value="Japan">Japan </option>
                <option value="Jordan">Jordan </option>
                <option value="Kazakihstan">Kazakihstan </option>
                <option value="Kenya">Kenya </option>
                <option value="Kiribati">Kiribati </option>
                <option value="Korea">Korea </option>
                <option value="Korea, Democratic People's">Korea, Democratic People's </option>
                <option value="Kuwait">Kuwait </option>
                <option value="Kyrgyz Republic">Kyrgyz Republic </option>
                <option value="Latvia">Latvia </option>
                <option value="Lebanese Republic">Lebanese Republic </option>
                <option value="Lesotho">Lesotho </option>
                <option value="Liberia">Liberia </option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya </option>
                <option value="Liechtenstein">Liechtenstein </option>
                <option value="Lithuania">Lithuania </option>
                <option value="Luxembourg">Luxembourg </option>
                <option value="Macau">Macau </option>
                <option value="Madagascar">Madagascar </option>
                <option value="Malawi">Malawi </option>
                <option value="Malaysia">Malaysia </option>
                <option value="Maldives">Maldives </option>
                <option value="Mali">Mali </option>
                <option value="Malta">Malta </option>
                <option value="Mariana Islands">Mariana Islands </option>
                <option value="Marshall Islands">Marshall Islands </option>
                <option value="Martinique">Martinique </option>
                <option value="Mauritania">Mauritania </option>
                <option value="Mauritius">Mauritius </option>
                <option value="Mayotte">Mayotte </option>
                <option value="Mexico">Mexico </option>
                <option value="Micronesia">Micronesia </option>
                <option value="Moldova">Moldova </option>
                <option value="Monaco">Monaco </option>
                <option value="Mongolia">Mongolia </option>
                <option value="Montserrat">Montserrat </option>
                <option value="Morocco">Morocco </option>
                <option value="Mozambique">Mozambique </option>
                <option value="Myanmar">Myanmar </option>
                <option value="Namibia">Namibia </option>
                <option value="Nauru">Nauru </option>
                <option value="Nepal">Nepal </option>
                <option value="Netherlands">Netherlands </option>
                <option value="Netherlands Antilles">Netherlands Antilles </option>
                <option value="New Caledonia">New Caledonia </option>
                <option value="New Zealand">New Zealand </option>
                <option value="Nicaragua">Nicaragua </option>
                <option value="Nigeria">Nigeria </option>
                <option value="Niue">Niue </option>
                <option value="Norfolk Island">Norfolk Island </option>
                <option value="Northern Ireland">Northern Ireland </option>
                <option value="Norway">Norway </option>
                <option value="Oman">Oman </option>
                <option value="Pakistan">Pakistan </option>
                <option value="Palau">Palau </option>
                <option value="Panama">Panama </option>
                <option value="Papua New Guinea">Papua New Guinea </option>
                <option value="Paraguay">Paraguay </option>
                <option value="People's Bangladesh">People's Bangladesh </option>
                <option value="Peru">Per&uacute;</option>
                <option value="Philippines">Philippines </option>
                <option value="Pitcairn">Pitcairn </option>
                <option value="Poland">Poland </option>
                <option value="Portuguese Republic">Portuguese Republic </option>
                <option value="Puerto Rico">Puerto Rico </option>
                <option value="Qatar">Qatar </option>
                <option value="Reunion">Reunion </option>
                <option value="Romania">Romania </option>
                <option value="Russian Federation">Russian Federation </option>
                <option value="Rwandese Republic">Rwandese Republic </option>
                <option value="Saint Lucia">Saint Lucia </option>
                <option value="San Marino">San Marino </option>
                <option value="Sao tome and Principe">Sao tome and Principe </option>
                <option value="Saudi Arabia">Saudi Arabia </option>
                <option value="Senegal">Senegal </option>
                <option value="Seychelles">Seychelles </option>
                <option value="Sierra Leone">Sierra Leone </option>
                <option value="Singapore">Singapore </option>
                <option value="Slovak Republic">Slovak Republic </option>
                <option value="Slovenia">Slovenia </option>
                <option value="Socialist Viet Nam">Socialist Viet Nam </option>
                <option value="Solomon Islands">Solomon Islands </option>
                <option value="Somali">Somali </option>
                <option value="South Africa">South Africa </option>
                <option value="Spain">Spain </option>
                <option value="Sri Lanka">Sri Lanka </option>
                <option value="St. Helena">St. Helena </option>
                <option value="St. Kitts &amp; Nevis">St. Kitts &amp; Nevis </option>
                <option value="St. Pierre and Miquelo">St. Pierre and Miquelo </option>
                <option value="State of Israel">State of Israel </option>
                <option value="Sudan">Sudan </option>
                <option value="Suriname">Suriname </option>
                <option value="Swaziland">Swaziland </option>
                <option value="Sweden">Sweden </option>
                <option value="Swiss Confederation">Swiss Confederation </option>
                <option value="Syrian Arab Republic">Syrian Arab Republic </option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan </option>
                <option value="Tanzania">Tanzania </option>
                <option value="Thailand">Thailand </option>
                <option value="The Niger">The Niger </option>
                <option value="Togolese Republic">Togolese Republic </option>
                <option value="Tokelau">Tokelau </option>
                <option value="Tonga">Tonga </option>
                <option value="Trinidad and Tobago">Trinidad and Tobago </option>
                <option value="Tunisia">Tunisia </option>
                <option value="Turkey">Turkey </option>
                <option value="Turkmenistan">Turkmenistan </option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands </option>
                <option value="Tuvalu">Tuvalu </option>
                <option value="Uganda">Uganda </option>
                <option value="Ukraine">Ukraine </option>
                <option value="United Arab Emirates">United Arab Emirates </option>
                <option value="Uruguay">Uruguay </option>
                <option value="USA">USA </option>
                <option value="Uzbekistan">Uzbekistan </option>
                <option value="Vanuatu">Vanuatu </option>
                <option value="Vatican City State">Vatican City State </option>
                <option value="Venezuela">Venezuela </option>
                <option value="Virgin Islands (British)">Virgin Islands (British) </option>
                <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.) </option>
                <option value="Wallis and Futuna Islands">Wallis and Futuna Islands </option>
                <option value="Western Sahara">Western Sahara </option>
                <option value="Western Samoa">Western Samoa </option>
                <option value="Yemen">Yemen </option>
                <option value="Yugoslav Macedonia">Yugoslav Macedonia </option>
                <option value="Yugoslavia">Yugoslavia </option>
                <option value="Zaire">Zaire </option>
                <option value="Zambia">Zambia </option>
                <option value="Zimbabwe">Zimbabwe </option>
                <option value="--">Otro Pa&iacute;s</option>
                <option value="--">Other Country</option>
              </select>
            </span></td>

              <br>


                 		<label><span class="required">*</span> Comentario: </label>
                 		<textarea name="message" cols="50" rows="6"  id="message"><?=$message;?></textarea>
                                 <br>

            			<label><span class="required">*</span> Control spam: <b>2 + 3=</b></label>
						<input name="spamcheck" type="text" class="box" id="spamcheck" size="4" value="<?=$spamcheck;?>" /><br /><br />

            			<!-- Submit Button-->
                 		<input name="send" type="submit" class="button" id="send" value="" />

            </form>

            <!-- E-mail verification. Do not edit -->
            <?php
            }

            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
                        ,$email));
            }
            ?>
            <!-- END CONTACT FORM -->

          <!--  <p align="center"><a href="http://www.foroz.org" target="_blank">Foroz</a></p>-->
          
     
</div> <!-- /contentForm -->
     
</body>
</html>

