<div class="navbar navbar-expand-xl navbar-static shadow">
    <div class="container-fluid">
        <div class="navbar-brand flex-1">
            <a href="{{route('home')}}" class="d-inline-flex align-items-center">
                <img src="{{asset('assets/images/logor.svg')}}" alt="">
                <img src="{{asset('assets/images/text.svg')}}" class="d-none d-sm-inline-block h-16px invert-dark ms-3" alt="">
            </a>
        </div>

        <div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0">
            <ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="navbar-nav-link rounded">
                        <i class="ph-user-circle me-1"></i>
                        Authors
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('books')}}" class="navbar-nav-link rounded">
                        <i class="ph-book me-1"></i>
                        Books
                    </a>
                </li>
            </ul>
        </div>

        <ul class="nav gap-1 flex-xl-1 justify-content-end order-0 order-xl-1">


            <li class="nav-item nav-item-dropdown-xl dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="https://avatars.githubusercontent.com/u/34916199?v=4" class="w-32px h-32px rounded" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-md-inline-block mx-md-2">{{session('user')['first_name'].' '.session('user')['last_name'] }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{route('profile')}}" class="dropdown-item">Profile</a>
                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
