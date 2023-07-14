<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="{{asset('img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Argon Dashboard 2 Laravel</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->email == 'admin@argon.com')
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0" data-bs-toggle="collapse" data-bs-target="#admin">Admin</h6>
            </li>
            <div id="admin" class="collapse">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('admins.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">New Admin </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'users') == true ? 'active' : '' }}" href="{{ route('admins') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Admins Management</span>
                    </a>
                </li>
            </div>
            @endif
            @if (auth()->user()->admin == 1)
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0" data-bs-toggle="collapse" data-bs-target="#users">Users</h6>
            </li>
            <div id="users" class="collapse">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('users.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">New User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'users') == true ? 'active' : '' }}" href="{{ route('users') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Users Management</span>
                    </a>
                </li>
            </div>
            @endif
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-instagram" style="color: #f4645f;"></i>
                </div>
                <a href="/admin/tracks" class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Tracks</a>
            </li>

            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-instagram" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0" data-bs-toggle="collapse" data-bs-target="#pages">Pages</h6>
            </li>
            <div id="pages" class="collapse">
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'tables']) }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{  str_contains(request()->url(), 'billing') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'billing']) }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Billing</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'virtual-reality' ? 'active' : '' }}" href="{{ route('virtual-reality') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Virtual Reality</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'rtl' ? 'active' : '' }}" href="{{ route('rtl') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">RTL</span>
                    </a>
                </li>
            </div>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-times" style="color: #f4645f;"></i>
                    
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0" data-bs-toggle="collapse" data-bs-target="#account_pages">Account pages</h6>
            </li>
            <div id="account_pages" class="collapse">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
            
            </div>
        </ul>
    </div>
{{--     <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="/img/illustrations/icon-documentation-warning.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="/docs/bootstrap/overview/argon-dashboard/index.html" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" type="button">Upgrade to PRO</a>
    </div> --}}
</aside>
