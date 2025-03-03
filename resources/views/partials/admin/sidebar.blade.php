<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="{{ route('admin_dashboard') }}" class="nav-link {{ Request::routeIs('admin_dashboard') ? 'active' : null }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin_users') }}" class="nav-link {{ Request::routeIs('admin_users') ? 'active' : null }}">Users</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin_product_series') }}" class="nav-link {{ Request::routeIs('admin_product_series') ? 'active' : null }}">Series</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin_products') }}" class="nav-link {{ Request::routeIs('admin_products') ? 'active' : null }}">Products</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin_cards') }}" class="nav-link {{ Request::routeIs('admin_cards') ? 'active' : null }}">Cards</a>
    </li>
</ul>