<!doctype html>
<html lang="en">
<?php include('menu.php'); ?>
<?php include('config.php'); ?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mascotas</title>
</head>

<body>
    <div class="container"><br>
        <div class="row">
            <div class="col-4">
                <div class="row justify-content-center">
                    <h4>Nueva Mascota</h4>
                    <hr>
                    <form class="mx-auto" action="gmascotas.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="raza" class="form-label">Raza:</label>
                            <input type="text" class="form-control" id="raza" name="raza">
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color:</label>
                            <input type="text" class="form-control" id="color" name="color">
                        </div>
                        <div class="mb-3">
                            <label for="peso" class="form-label">Peso:</label>
                            <input type="number" class="form-control" id="peso" name="peso" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="altura" class="form-label">Altura:</label>
                            <input type="number" class="form-control" id="altura" name="altura" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-select" id="sexo" name="sexo">
                                <option value="m">Macho</option>
                                <option value="h">Hembra</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fech_nacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" id="fech_nacimiento" name="fech_nacimiento">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>


                </div>
            </div>
            <div class="col-8">
                <?php

                // Ejecutar una consulta SELECT para obtener todos los datos de la tabla "mascotas"
                $stmt = $pdo->prepare("SELECT * FROM mascotas");
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Crear una tabla HTML5 con encabezados para cada columna
                echo '<table class="table table-hover">';
                echo '<tr>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Color</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Sexo</th>
                            <th>Fecha de nacimiento</th>
                        </tr>';

                // Recorrer los resultados de la consulta y mostrar cada fila en la tabla
                foreach ($results as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['raza'] . '</td>';
                    echo '<td>' . $row['color'] . '</td>';
                    echo '<td>' . $row['peso'] . '</td>';
                    echo '<td>' . $row['altura'] . '</td>';
                    echo '<td>' . $row['sexo'] . '</td>';
                    echo '<td>' . $row['fech_nacimiento'] . '</td>';
                    // Agregar botones de editar y eliminar para cada fila
                    echo '<td><a href="editar.php?id=' . $row['id_mascota'] . '">Editar</a> | <a href="eliminar.php?id=' . $row['id_mascota'] . '">Eliminar</a></td>';
                    echo '</tr>';
                }

                echo '</table>';

                // Cerrar la conexión a la base de datos
                $conn = null;
                ?>

            </div>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>