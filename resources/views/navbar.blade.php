<link rel="stylesheet" href="/css/navbar.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="nav-area">
    <div class="left-menu-area"><a href="{{ route('index') }}">eLibrary</a></div>
    <div class="center-menu-area">
        <div class="form-area">
            <form>
                <input type="text" class="input-search" name="book_name" placeholder="Ne aramıştınız ?">
            </form>
        </div>
    </div>
    <div class="right-menu-area">
        <div class="auth-area">
            @auth
                <a href="{{ route('profile', [$user->id]) }}">
                    <div class="auth">Profil</div>
                </a>
                <a href="{{ route('logout') }}">
                    <div class="auth">Çıkış yap</div>
                </a>
                <a href="{{ route('profile', [$user->id]) }}">
                    <img src="/img/login.png">
                </a>
            @else
                <a href="{{ route('register') }}">
                    <div class="auth">Üye ol</div>
                </a>
                <a href="{{ route('login') }}">
                    <div class="auth">Giriş yap</div>
                </a>
                <a href="{{ route('login') }}">
                    <img src="/img/login.png">
                </a>
            @endauth
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<script src="/js/search.js"></script>

<script>
    $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
            $('.nav-area').addClass('sticky');
        } else {
            $('.nav-area').removeClass('sticky');
        }
    });
</script>
