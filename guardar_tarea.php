<?php

include("db.php");

if(isset($_POST['guardar_tarea'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    
    $query = "INSERT INTO tarea(titulo,descripcion) VALUES ('$titulo','$descripcion')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query fallida");
    }

    $_SESSION['mensaje'] = "Tarea guardada satisfactoriamente";
    $_SESSION['mensaje_color'] = "success";

    header("Location: index.php");
}
?>