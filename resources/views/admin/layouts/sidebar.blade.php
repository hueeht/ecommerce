<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href={{ route('admin.index') }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ trans('admin.dashboard') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route('admin.categories.index') }} >
            <i class="fas fa-fw fa-folder"></i>
            <span>{{ trans('admin.category') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route('admin.products.index') }}>
            <i class="fab fa-product-hunt"></i>
            <span>{{ trans('admin.product') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route('admin.orders.index') }}>
            <i class="fa fa-shopping-cart"></i>
            <span>{{ trans('admin.order') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href={{ route('admin.users.index') }}>
            <i class="fas fa-user-cog"></i>
            <span>{{ trans('admin.user') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="logoutAdmin" href={{ route('logout') }} >
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>

