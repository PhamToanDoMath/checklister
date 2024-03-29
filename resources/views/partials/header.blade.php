<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
        data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
        </svg>
    </button><a class="c-header-brand d-lg-none" href="#">
        <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{asset('assets/brand/coreui.svg#cil-user')}}"></use>
        </svg></a>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
        data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-menu')}}"></use>
        </svg>
    </button>
    <ul class="c-header-nav d-md-down-none">
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
        <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>
    </ul>
    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item"><a class="c-header-nav-link" href="{{route('consultation')}}">
            Get Consultation</a></li>
        <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link" href="{{route('welcome')}}">
                <svg class="c-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                </svg></a></li>
        <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-expanded="false">
                <div class="c-avatar"><svg class="c-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                    </svg></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                <a class="dropdown-item" href="login.html" target="_top" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <svg class="c-icon mr-2">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                    </svg> {{ __('Logout')}}
                </a>
            </div>
        </li>
    </ul>

    <!-- Sub-header section -->
    <!-- <div class="c-subheader px-3">

<ol class="breadcrumb border-0 m-0">
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item"><a href="#">Admin</a></li>
<li class="breadcrumb-item active">Dashboard</li>

</ol>
</div> -->
</header>