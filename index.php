<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['mensaje'])){ ?>
                <div class="alert alert-<?php echo $_SESSION['mensaje_color'] ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensaje'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } session_unset();?>
            <div class="card card-body">
                <form action="guardar_tarea.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tarea";
                        $result_tareas = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($result_tareas)){ ?>
                            <tr>
                                <td><?php echo $row['titulo']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td><?php echo $row['fecha_creacion']; ?></td>
                                <td>
                                    <a href="editar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="eliminar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
    