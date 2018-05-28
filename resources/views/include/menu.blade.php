<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @if (auth()->user()->role == \App\User::ADMINISTRATOR)
                    <li class="active has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-tachometer-alt"></i>Адміністратор</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
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


                        </ul>
                    </li>
                @endif
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
            </ul>
        </nav>
    </div>
</aside>

