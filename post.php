<?php
$servername = "localhost";
$username ="root";
$password =" ";
$dbname = "base-facu";
$db=[$servername="localhost",$username,$dbname,$password];

//  header("HTTP/1.1 400 OK");
//  header("HTTP/1.1 500 OK");
//  header("HTTP/1.1 200 OK");

//agregar encabezados CORS para permitir solicitudes de cualquier orige n
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:Content-Type");
?>
<?php
function connect()
{
    $conn = mysqli_connect("127.0.0.1","root","","base-facu");
        if(!$conn){
            die("no se conecto a la base de datos". mysqli_error());
        }
        echo"conexion exitosa";
        mysqli_close($conn);


}

?>
<?php
connect();
?>

