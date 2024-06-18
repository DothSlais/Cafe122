<header>
    <nav>
        <ul class="topnav">
            <li>
                <a href="{{ route('login.form') }}" class="{{ request()->routeIs('login.form') ? 'active' : '' }}">
                    Iniciar Sesión
                </a>
            </li>
            <li>
                <a href="{{ route('cafe.index') }}" class="{{ request()->routeIs('cafe.index') ? 'active' : '' }}">
                    Comprar
                </a>
            </li>
            <li>
                <a href="{{ route('carrito.index') }}" class="{{ request()->routeIs('carrito.index') ? 'active' : '' }}" style="position:absolute; top: 8px; right: 9px;">
                    <img src="{{ asset('images/cart.png') }}" alt="Carrito" style="width: 20px; height: 20px;">
                </a>
            </li>
        </ul>
    </nav>
</header>
