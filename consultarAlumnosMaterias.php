<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="code.jquery.com_jquery-3.7.1.js"></script>
</head>
<body>
<?php 
        include 'menu.php'; 
        include 'conexion.php'; 
        $sql = "SELECT * FROM alumnos";
        $datos = $conexion->query($sql);

    ?>    
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php if($datos->num_rows > 0) { ?>
                <?php while($registro = $datos->fetch_assoc()){
                    $id = $registro["id"];
                    $sql2 = "SELECT a.*, m.nombre AS materia_nombre FROM alumnos a INNER JOIN alumnos_materias am ON a.id = am.alumnos_id INNER JOIN materias m ON m.id = am.materia_id";
                    $datos2 = $conexion->query($sql2);
                    ?>
                    <div class="card">
                        <div class="card-heard">
                            <?php echo $registro ["nombre"]; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">materias cargadas:</h5>
                            <p class="card-text">
                                <ul>
                                    <?php while($materia = $datos2->fetch_assoc()){ ?>
                                        <li> <?php echo $materia["materia_nombre"]; ?></li>
                                    <?php } ?>
                                </ul>
                            </p>
                        </div>
                    </div>

                    <?php } ?>
                    <?php }else { ?>
                    <h2 class="m-4">No existe datos de alumnos en la base e datos</h2>
                <?php } ?>
            </div>
        </div>
    </div>

<footer class="text-center">
        <hr>
        CETIS 107 &copy; 2023
    </footer>

    <script src="js/bootstrap.js"></script>
</body>
</html>