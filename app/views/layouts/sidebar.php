<div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="bg-dark text-white vh-100 p-3" style="width: 250px;">
        <h4 class="text-center">Inventario</h4>
        <button id="toggleSidebar" class="btn btn-primary w-100 mb-3 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">☰</button>
        <div id="sidebarMenu" class="collapse d-lg-block">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="?module=home" class="nav-link text-white">🏠 Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="?module=warehouseControl" class="nav-link text-white">🏭 Bodegas</a>
                </li>
                <li class="nav-item">
                    <a href="?module=categories" class="nav-link text-white">📥 Categorias Articulos</a>
                </li>
                <li class="nav-item">
                    <a href="?module=products" class="nav-link text-white">📦 Articulos</a>
                </li>
              
                <li class="nav-item">
                    <a href="?module=entries" class="nav-link text-white">📈 Ingreso Inventario</a>
                </li>

                <li class="nav-item">
                    <a href="?module=warehouseControl" class="nav-link text-white">📉 Salida Inventario</a>
                </li>

              

                <li class="nav-item">
                    <a href="?module=warehouseControl" class="nav-link text-white">📊 Historial</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div id="content" class="flex-grow-1 p-4">
