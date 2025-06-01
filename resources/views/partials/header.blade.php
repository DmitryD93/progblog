<header class="header">
    <div class="header-logo">
        <div class="mini-cube-container">
            <div class="mini-cube">
                <!-- Грани куба -->
                <div class="mini-cube-face mini-cube-face--front">
                    <img src="{{ Vite::asset('resources/images/icons/code-json.svg') }}" alt="">
                </div>
                <div class="mini-cube-face mini-cube-face--back">
                    <img src="{{ Vite::asset('resources/images/icons/javascript.svg') }}" alt="">
                </div>
                <div class="mini-cube-face mini-cube-face--right">
                    <img src="{{ Vite::asset('resources/images/icons/phpstorm.svg') }}" alt="">
                </div>
                <div class="mini-cube-face mini-cube-face--left">
                    <img src="{{ Vite::asset('resources/images/icons/webstorm.svg') }}" alt="">
                </div>
                <div class="mini-cube-face mini-cube-face--top">
                    <img src="{{ Vite::asset('resources/images/icons/vscode.svg') }}" alt="">
                </div>
                <div class="mini-cube-face mini-cube-face--bottom">
                    <img src="{{ Vite::asset('resources/images/icons/sass.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <nav class="header-nav">
        @auth()
            <span>{{ Auth::user()->name }}</span>

            @if (Auth::user()->isAdmin())
                <a href="#" class="header-nav__link">Панель управления</a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class=""
                >
                    Выйти
                </button>
            </form>
        @else
            <button type="button" data-fancybox data-src="#dialog-register" class="header-nav__link btn">
                Register
            </button>
            <button type="button" data-fancybox data-src="#dialog-login" class="header-nav__link btn">
                Login
            </button>
        @endauth
    </nav>
</header>


<div id="dialog-register" style="display:none;max-width:100%;">
    <livewire:auth.register/>
</div>
<div id="dialog-login" style="display:none;max-width:100%;">
    <livewire:auth.user-login/>
</div>







