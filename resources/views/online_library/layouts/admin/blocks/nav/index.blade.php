<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-between p-2" id="bs-navbar-collapse-1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ route('admin') }}" title="Главная" class="{{ Route::is('admin*') ? 'active' : '' }} nav-link">Главная</a></li>
                @auth
                    <li class="nav-item"><a href="/my_library/{{ Auth::user()->id }}" title="Моя библиотека" class="{{ Route::is('my_library*') ? 'active' : '' }} nav-link">Моя библиотека</a></li>
                    <li class="nav-item"><a href="{{ route('add_book') }}" title="Добавить книгу" class="{{ Route::is('add_book*') ? 'active' : '' }} nav-link">Добавить книгу</a></li>
                    <li class="nav-item"><a href="{{ route('users') }}" title="Пользователи" class="{{ request()->routeIs('users') ? 'active' : '' }} nav-link">Пользователи</a></li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
                    </li>

                    @if (Route::has('register'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
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
                                Выход
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                @csrf

                            </form>
                        </div>
                    </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>