<?php
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tarea WHERE id = $id";
    $result = mysqli_query($conn,$query);
    
    if(!$result){
        die("Query fallida");
    }

    $_SESSION['mensaje'] = "Tarea eliminada satisfactoriamente";
    $_SESSION['mensaje_color'] = "danger";

    header("Location: index.php");
}
?>