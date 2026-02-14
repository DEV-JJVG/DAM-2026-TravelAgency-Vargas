<?php
require_once "vistas/db.php";

// Verifico el id y los elementos actuales
if (isset($_GET['pack_id'])) {
    $pack_id = $_GET['pack_id'];

    $stmt = $pdo->prepare("SELECT * FROM packages WHERE package_id = :id");
    $stmt->execute([':id' => $pack_id]);
    $row = $stmt->fetch();

    if (!$row) {
        die("Paquete no encontrado.");
    }
} else {
    header("Location: index.php");
    exit();
}

// Proceso el formulario al guardar
if (isset($_POST['update_package'])) {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $id = $_POST['pack_id'];
    $old_image = $_POST['old_image'];

    // Cambio de imagen
    $image_name = $_FILES['new_image']['name'];

    if ($image_name != "") {
        $image_temp = $_FILES['new_image']['tmp_name'];
        move_uploaded_file($image_temp, "assets/imagenes/packages/$image_name");
        $final_image = $image_name;
    } else {
        // Si no subió nada, mantenemos la anterior
        $final_image = $old_image;
    }

    // Actualización SQL con PDO
    $sql_update = "UPDATE packages SET 
                    package_title = :title, 
                    package_price = :price, 
                    package_desc = :desc, 
                    package_image = :img 
                   WHERE package_id = :id";

    $stmt = $pdo->prepare($sql_update);

    $result = $stmt->execute([
        ':title' => $title,
        ':price' => $price,
        ':desc' => $desc,
        ':img' => $final_image,
        ':id' => $id
    ]);

    if ($result) {
        echo "<script>alert('¡Paquete actualizado con éxito!'); window.location.href='details.php?pack_id=$id';</script>";
    } else {
        echo "<script>alert('Error al actualizar.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar Paquete</title>
        <link rel="stylesheet" href="assets/styles/style.css">
        <style>
            /*Estilado para el formulario basiquito*/
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
            input[type="text"], textarea {
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
                        <h2 style="text-align: center;">Editar Paquete</h2>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="pack_id" value="<?php echo $row['package_id']; ?>">
                            <input type="hidden" name="old_image" value="<?php echo $row['package_image']; ?>">

                            <div class="agrupado-form">
                                <label>Título del Paquete:</label>
                                <input type="text" name="title" value="<?php echo $row['package_title']; ?>" required>
                            </div>

                            <div class="agrupado-form">
                                <label>Precio (€):</label>
                                <input type="text" name="price" value="<?php echo $row['package_price']; ?>" required>
                            </div>

                            <div class="agrupado-form">
                                <label>Imagen Actual:</label>
                                <img src="assets/imagenes/packages/<?php echo $row['package_image']; ?>" width="100"><br>
                                <label>Cambiar Imagen (Opcional):</label>
                                <input type="file" name="new_image">
                            </div>

                            <div class="agrupado-form">
                                <label>Descripción:</label>
                                <textarea name="desc" rows="6" required><?php echo $row['package_desc']; ?></textarea>
                            </div>

                            <div style="text-align: center; margin-top: 20px;">
                                <a href="details.php?pack_id=<?php echo $pack_id; ?>" class="btn-cancelar">Cancelar</a>
                                <button type="submit" name="update_package" class="btn-guardar">Guardar Cambios</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <?php include "vistas/footer.php"; ?>
        </div>
    </body>
</html>

