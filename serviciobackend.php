<?php
include("conexion.php");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET,POST");
header("Access-Control-Allow-Headers:Content-Type");
header("Access-Control-Allow-url-fopen:1");



if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM `tarea` WHERE 1";
    //prepara la secuencia sql
    $consulta = mysqli_query($conn,$sql);
    if($consulta){
        // echo json_encode("{Consulta exitosa}");
    }
    $items = array();
    while($fila = mysqli_fetch_assoc($consulta)){
        $items[] = $fila;
    }
    //se coloca el headers para indicar que se esta devolviendo un json.
    header('Content-Type:application/json');
    // codificar en formato json el objeto.
    echo json_encode($items);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $texto = $_POST["nombre"];
    $estado =$_POST["estado"];
    $sql ="INSERT INTO tarea(id, nombre, estado) VALUES ('NULL','$texto','$estado')";
    $consulta = mysqli_query($conn,$sql);
    if($sql){
        echo json_encode("TAREA REGISTRADA EXITOSAMENTE");
    }
    $conn->close();
}
?>