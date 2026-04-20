<div class="menubar">
    <ul id="menu">
        <li><a href="index.php">Inicio</a></li>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
            <li><a href="agregar_paquete.php">Agregar un nuevo viaje</a></li>
        <?php endif; ?>
    </ul>

    <form method="get" action="index.php" id="search_form">
        <input type="text" name="user_query" placeholder="Buscar destino..." />
        <input type="date" name="date_query" />
        <button type="submit" name="search" value="true">Buscar</button>
    </form>
</div>