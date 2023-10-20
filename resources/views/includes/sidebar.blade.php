<!-- Sidebar -->
<ul class="navbar-nav bg-main-color sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center w-100"
        href="{{ Auth::user()->roles == 'ADMIN' ? route('dashboard-admin') : (Auth::user()->roles == 'MANAGER' ? route('dashboard-manager') : '') }}">
        <div class="">
            <img src="/images/icon-app.svg" alt="" class="w-50 h-50">
        </div>
        <div class="sidebar-brand-text mx-3">Coffe Shop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Auth::user()->roles == 'EMPLOYEE')
        <!-- Heading -->
        <div class="sidebar-heading text-white">
            Operational
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#orderModal" href="#">
                <i class="fa-solid fa-cart-plus"></i>
                <span>Add New Order</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>History Transactions</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @else
        <!-- Heading -->
        <div class="sidebar-heading text-white">
            Menus
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link"
                href="{{ Auth::user()->roles == 'ADMIN' ? route('data-categories') : (Auth::user()->roles == 'MANAGER' ? route('manager-data-categories') : '') }}">
                <i class="fa-solid fa-clipboard-list"></i>
                <span>Categories</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
                href="{{ Auth::user()->roles == 'ADMIN' ? route('data-product') : (Auth::user()->roles == 'MANAGER' ? route('manager-data-product') : '') }}">
                <i class="fa-solid fa-mug-hot"></i>
                <span>Products</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-white">
            Operational
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link"
                href="{{ Auth::user()->roles == 'ADMIN' ? route('data-user') : (Auth::user()->roles == 'MANAGER' ? route('manager-data-user') : '') }}">
                <i class="fa-solid fa-users"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>History Transactions</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    @endif



</ul>
<!-- End of Sidebar -->
