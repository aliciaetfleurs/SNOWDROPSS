<nav id="topNav">
    <section class="flexTop">
        <a class="leftTop" href="/intern/musicdistributionsite/public/">
            <div class="leftLogo">
                <div id="snowdropLogo"></div>
                <h2>
                    SNOWDROPSS
                </h2>
            </div>
            <button id="btnBack" class="controlBtn"></button>
        </a>
        <form action="/intern/musicdistributionsite/public/search" method="get" class="rightTop">
            <div class="topControlButtons">
                <button id="btnForward" class="controlBtn"></button>
            </div>
            <button class="navSearchButton" type="submit"></button>
            <input type="text" id="navSearch" name="navSearch" placeholder="SEARCH" value="" autocomplete="off">
        </form>
        <div>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </section>    
</nav>
    @yield('content')
</body>
</html>
