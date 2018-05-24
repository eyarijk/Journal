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
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Адміністратор</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
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


                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

