<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tarea WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_array($result);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];

            
        }
    }

    if(isset($_POST['editar'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tarea SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query fallida");
        }

        $_SESSION['mensaje'] = "Tarea actualizada satisfactoriamente";
        $_SESSION['mensaje_color'] = "info";

        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="containter p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_tarea.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza el titulo">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la tarea"><?php echo $descripcion; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="editar">
                        Editar tarea
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>