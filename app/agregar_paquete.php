<?php
session_start();
require_once "vistas/db.php";

// Verifico si el usuario es administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Si no es admin, redirijo al inicio
    header("Location: index.php");
    exit();
}

// Proceso el formulario al guardar
if (isset($_POST['insert_package'])) {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    // Compruebo si se ha seleccionado una nueva imagen en el formulario
    $image_name = $_FILES['new_image']['name'];

    if ($image_name != "") {
        // Si se subió una nueva, la muevo a la carpeta de destino y guardo su nombre
        $image_temp = $_FILES['new_image']['tmp_name'];
        move_uploaded_file($image_temp, "assets/imagenes/packages/$image_name");
        $final_image = $image_name;
    } else {
        // Si no subí nada, asigno una cadena vacía o imagen por defecto
        $final_image = "default.png";
    }

    // Por último inserto en la base de datos con los datos del formulario, encadenando prepare y execute
    $result = $conexion->prepare("INSERT INTO packages (package_title, package_price, package_desc, package_image) VALUES (?, ?, ?, ?)")->execute([$title, $price, $desc, $final_image]);

    if ($result) {
        echo "<script>alert('¡Paquete agregado con éxito!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al agregar el paquete.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Paquete</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <style>
        /*Estilado para el formulario básico*/
        .form-contenedor {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
        }

        .agrupado-form {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
        }

        .btn-guardar {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-cancelar {
            background-color: #7f8c8d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="main_wrapper">
        <?php include 'vistas/header.php'; ?>
        <?php include 'vistas/navbar.php'; ?>

        <div class="content_wrapper">
            <div id="content_area">

                <div class="form-contenedor">
                    <h2 style="text-align: center;">Agregar Nuevo Paquete</h2>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="agrupado-form">
                            <label>Título del Paquete:</label>
                            <input type="text" name="title" required>
                        </div>

                        <div class="agrupado-form">
                            <label>Precio (€):</label>
                            <input type="text" name="price" required>
                        </div>

                        <div class="agrupado-form">
                            <label>Imagen del Paquete:</label>
                            <input type="file" name="new_image" required>
                        </div>

                        <div class="agrupado-form">
                            <label>Descripción:</label>
                            <textarea name="desc" rows="6" required></textarea>
                        </div>

                        <div style="text-align: center; margin-top: 20px;">
                            <a href="index.php" class="btn-cancelar">Cancelar</a>
                            <button type="submit" name="insert_package" class="btn-guardar">Agregar Paquete</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>

        <?php include "vistas/footer.php"; ?>
    </div>
</body>

</html>