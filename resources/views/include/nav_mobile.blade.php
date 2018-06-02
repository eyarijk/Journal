<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                @if (auth()->user()->role == \App\User::ADMINISTRATOR)
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Панель керування</a>
                    </li>
                    <li>
                        <a href="{{ route('groups.index') }}">Групи</a>
                    </li>
                    <li>
                        <a href="{{ route('subjects.index') }}">Заняття</a>
                    </li>
                    <li>
                        <a href="{{ route('teachers.index') }}">Викладачі</a>
                    </li>
                    <li>
                        <a href="{{ route('students.index') }}">Студенти</a>
                    </li>
                    <li>
                        <a href="{{ route('couples.index') }}">Пари</a>
                    </li>
                @else
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{ route('teacher.index') }}">
                            <i class="fas fa-table"></i>Пари</a>
                    </li>
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{ route('black-list.index') }}">
                            <i class="fas fa-table"></i>Чорний список</a>
                    </li>
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{ route('rating.index') }}">
                            <i class="fas fa-table"></i>Рейтинг</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

