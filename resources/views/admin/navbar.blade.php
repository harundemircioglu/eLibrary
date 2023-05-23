<div class="navbar-area">
    <div class="container">
        <div class="main-nav-area">
            <div class="left-menu-area">
                <div class="logo-area">
                    <a href="{{ route('home') }}">
                        <div class="logo">Admin {{ $user->name }}</div>
                    </a>
                </div>
            </div>
            <div class="center-menu-area"></div>
            <div class="right-menu-area">
                <div class="logout-area">
                    <a href="{{ route('logout') }}">Çıkış yap</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-control-area">
    <div class="container">
        <div id="menuControlItem" class="menu-control-item">Menü</div>
    </div>
</div>
