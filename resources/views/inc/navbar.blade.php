<header class="fixed-top shadow-sm">
    <nav class="d-flex align-items-center container">
        <a href="/" class="nav-logo">{{config('app.name', 'CheckInn')}}</a>

        
        <form action="" method="get" class="d-flex ml-5">
            <div>
                <input type="text" name="searchHotel" placeholder="Search Hotels">
            </div>
            <div>
                <button type="submit"><i class="fas fa-search"></i> Search</button>
            </div>
        </form>

        <!-- Right Side Of Navbar -->
        <ul class="d-flex ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </nav>
</header>
