<?php
session_start();
include('config.php');
?>
<!doctype html>
<html lang="en">
<?php include('menu.php'); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mascotas</title>
</head>

<body>
    <div class="container">
        <?php
        //if (isset($_POST['submit'])) {
        $nombre = $_POST['nombre'];
        $raza = $_POST['raza'];
        $color = $_POST['color'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $sexo = $_POST['sexo'];
        $fech_nacimiento = $_POST['fech_nacimiento'];

        $errors = array();

        if (empty($nombre) || strlen($nombre) < 2) {
            $errors[] = 'El nombre debe tener al menos 2 caracteres.';
        }

        if (empty($raza) || strlen($raza) < 2) {
            $errors[] = 'La raza debe tener al menos 2 caracteres.';
        }

        if (empty($color) || strlen($color) < 2) {
            $errors[] = 'El color debe tener al menos 2 caracteres.';
        }

        if (empty($peso) || !is_numeric($peso) || $peso < 0) {
            $errors[] = 'El peso debe ser un número positivo.';
        }

        if (empty($altura) || !is_numeric($altura) || $altura < 0) {
            $errors[] = 'La altura debe ser un número positivo.';
        }

        if ($sexo !== 'm' && $sexo !== 'h') {
            $errors[] = 'El sexo debe ser "masculino" o "femenino".';
        }

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fech_nacimiento)) {
            $errors[] = 'La fecha de nacimiento debe tener el formato yyyy-mm-dd.';
        }

        if (!empty($errors)) {
            // Mostrar errores
            foreach ($errors as $error) {
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }
        } else {
            $stmt = $pdo->prepare('INSERT INTO mascotas (nombre, raza, color, peso, altura, sexo, fech_nacimiento) VALUES (:nombre, :raza, :color, :peso, :altura, :sexo, :fech_nacimiento)');
            if ($stmt->execute(array(
                ':nombre' => $nombre,
                ':raza' => $raza,
                ':color' => $color,
                ':peso' => $peso,
                ':altura' => $altura,
                ':sexo' => $sexo,
                ':fech_nacimiento' => $fech_nacimiento
            ))) {
                echo "<script>alert('La mascota se ha registrado correctamente'); window.location = 'mascotas.php';</script>";
            } else {
                echo "<script>alert('Error al registrar la mascota');</script>";
            }
            $conn = null;
        }
        //}
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>