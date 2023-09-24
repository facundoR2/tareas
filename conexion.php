<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:Content-Type");

$conn = new mysqli("localhost","root","","base-facu");
// if(!$conn){
//     echo("error al conectarse");
// }else{
//     echo("CONEXION EXITOSA");
// }

?>
