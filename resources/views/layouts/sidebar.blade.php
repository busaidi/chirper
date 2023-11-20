<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-text mx-3">MyApp</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Inventory Management -->
    <div class="sidebar-heading">
        Inventory Management
    </div>

    <!-- Nav Item - Inventory -->
    <li class="nav-item {{ request()->is('inventory') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/inventory') }}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Inventory</span>
        </a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item {{ request()->is('products') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/products') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Products</span>
        </a>
    </li>


    <!-- Nav Item - Suppliers -->
    <li class="nav-item {{ request()->is('suppliers') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/suppliers') }}">
            <i class="fas fa-fw fa-truck-loading"></i>
            <span>Suppliers</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Sales and Purchases -->
    <div class="sidebar-heading">
        Sales & Purchases
    </div>

    <!-- Nav Item - Sales -->
    <li class="nav-item {{ request()->is('sales') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/sales') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Sales</span>
        </a>
    </li>

    <!-- Nav Item - Purchases -->
    <li class="nav-item {{ request()->is('purchases') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/purchases') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Purchases</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Accounting -->
    <div class="sidebar-heading">
        Accounting
    </div>

    <!-- Nav Item - Reports -->
    <li class="nav-item {{ request()->is('reports') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/reports') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Reports</span>
        </a>
    </li>

    <!-- Nav Item - Ledger -->
    <li class="nav-item {{ request()->is('ledger') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/ledger') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Ledger</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
