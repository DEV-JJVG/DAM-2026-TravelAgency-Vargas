<?php
session_start(); // Iniciamos sesión
require_once "vistas/db.php";
require_once "functions/functions.php";

// Verificamos si el modo admin está activo
$is_admin = $_SESSION['admin_mode'] ?? false;

// Lógica de eliminación (Doble seguridad: Solo ejecuta si es admin)
if (isset($_POST['btn_eliminar']) && $is_admin) {
    $id_a_borrar = $_POST['id_borrar'];
    $sql_delete = "DELETE FROM packages WHERE package_id = :id";
    $stmt_delete = $pdo->prepare($sql_delete);

    if ($stmt_delete->execute([':id' => $id_a_borrar])) {
        echo "<script>
                alert('Paquete eliminado correctamente'); 
                window.location.href='index.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Error al eliminar el paquete');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Travel Bird : Detalles del Destino</title>
        <link rel="stylesheet" href="assets/styles/style.css?v=<?php echo time(); ?>" media="all">

        <script>
            function confirmarEliminacion(event) {
                event.preventDefault();
                const form = event.target;
                if (confirm('¡ATENCIÓN!\n\n¿Estás seguro de que deseas eliminar este paquete permanentemente?')) {
                    form.submit();
                }
            }
        </script>

        <style>
            /* --- Estilos Botones --- */
            .btn-action {
                padding: 12px 25px;
                text-decoration: none;
                color: white;
                border: none;
                cursor: pointer;
                font-size: 14px;
                font-weight: 700;
                border-radius: 50px;
                transition: transform 0.2s, box-shadow 0.2s;
                text-transform: uppercase;
                letter-spacing: 1px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .btn-action:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            .btn-back { background-color: #95a5a6; }
            .btn-edit { background-color: #E9C46A; color: #333; }
            .btn-delete { background-color: #E76F51; }

            /* --- Estilos Fechas --- */
            .detail-dates {
                background-color: #f8f9fa;
                border-left: 5px solid #2A9D8F;
                padding: 15px 20px;
                margin-bottom: 25px;
                border-radius: 4px;
                display: flex;
                gap: 30px;
                align-items: center;
            }
            .date-item { display: flex; flex-direction: column; }
            .date-label { font-size: 0.85rem; text-transform: uppercase; color: #7f8c8d; font-weight: 700; margin-bottom: 2px; }
            .date-value { font-size: 1.1rem; color: #2c3e50; font-weight: 600; display: flex; align-items: center; gap: 8px; }
        </style>
    </head>

    <body>
        <div class="main_wrapper">

            <?php include 'vistas/header.php'; ?>
            <?php include 'vistas/navbar.php'; ?>

            <div class="content_wrapper">
                <?php include "vistas/left-sidebar.php"; ?>

                <div id="content_area">

                    <?php
                    if (isset($_GET['pack_id'])) {
                        $package_id = $_GET['pack_id'];
                        $sql = "SELECT * FROM packages WHERE package_id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([':id' => $package_id]);

                        if ($row_pack = $stmt->fetch()) {
                            $pack_id = $row_pack['package_id'];
                            $pack_title = $row_pack['package_title'];
                            $pack_price = number_format($row_pack['package_price'], 2);
                            $pack_image = $row_pack['package_image'];
                            $pack_desc = $row_pack['package_desc'];
                            
                            $raw_start = isset($row_pack['start_date']) ? $row_pack['start_date'] : null;
                            $raw_end = isset($row_pack['end_date']) ? $row_pack['end_date'] : null;
                            $pack_start = $raw_start ? date("d/m/Y", strtotime($raw_start)) : "Consultar";
                            $pack_end = $raw_end ? date("d/m/Y", strtotime($raw_end)) : "Consultar";

                            // --- PREPARAMOS LOS BOTONES DE ADMIN ---
                            // Por defecto vacíos
                            $admin_buttons = "";
                            
                            // Si es admin, rellenamos la variable con el HTML
                            if ($is_admin) {
                                $admin_buttons = "
                                    <a href='editar_paquete.php?pack_id=$pack_id' class='btn-action btn-edit'>Editar</a>
                                    
                                    <form method='POST' action='' style='display:inline;' onsubmit='confirmarEliminacion(event)'>
                                        <input type='hidden' name='id_borrar' value='$pack_id'>
                                        <button type='submit' name='btn_eliminar' class='btn-action btn-delete'>Eliminar</button>
                                    </form>
                                ";
                            }
                            // ---------------------------------------

                            echo "
                            <div class='detail-card'>
                                <div class='detail-image-container'>
                                    <img src='assets/imagenes/packages/$pack_image' alt='$pack_title'>
                                </div>

                                <div class='detail-info'>
                                    <h1 class='detail-title'>$pack_title</h1>
                                    <div class='detail-price'>$ $pack_price</div>

                                    <div class='detail-dates'>
                                        <div class='date-item'>
                                            <span class='date-label'>Fecha de Ida</span>
                                            <span class='date-value'>$pack_start</span>
                                        </div>
                                        <div style='border-left: 1px solid #ccc; height: 30px;'></div> 
                                        <div class='date-item'>
                                            <span class='date-label'>Fecha de Vuelta</span>
                                            <span class='date-value'>$pack_end</span>
                                        </div>
                                    </div>

                                    <div class='detail-desc'>$pack_desc</div>
                                    
                                    <div class='detail-actions'>
                                        <a href='index.php' class='btn-action btn-back'>&larr; Volver</a>
                                        
                                        <div style='flex-grow: 1'></div> 

                                        $admin_buttons
                                        
                                    </div>
                                </div>
                            </div>
                            ";
                        } else {
                            echo "<div style='text-align:center; padding:50px;'><h3>Lo sentimos, no se encontró el paquete.</h3><a href='index.php' class='btn-action btn-back'>Volver al inicio</a></div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php include "vistas/footer.php"; ?>
        </div>
    </body>
</html>