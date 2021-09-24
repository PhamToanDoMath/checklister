<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav" style="overflow:hidden">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home')}}">
                <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg>
                Dashboard
                <span class="badge badge-info">NEW</span>
            </a>
        </li>

        @if(Auth::user()->is_admin)

        {{-- //Test code
            <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>
            @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
                    <a class="c-sidebar-nav-link"
                    href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                        </svg> {{ $group->name }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @foreach ($group->checklists as $checklist)
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link" style="padding: .5rem .5rem .5rem 76px"
                                href="{{ route('admin.checklists.edit', [$group, $checklist]) }}">
                                    <svg class="c-sidebar-nav-icon">
                                        <use
                                            xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                                    </svg>
                                    {{ $checklist->name }}</a>
                            </li>
                        @endforeach
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" style="padding: 1rem .5rem .5rem 76px"
                            href="{{ route('admin.checklists.create', $group) }}">
                                <svg class="c-sidebar-nav-icon">
                                    <use
                                        xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-note-add') }}"></use>
                                </svg>
                                {{ __('New checklist') }}</a>
                        </li>
                    </ul>
                </li>
            @endforeach
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.create') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
                    </svg>
                    {{ __('New checklist group') }}</a>
            </li>
            //End test code --}}


            <li class="c-sidebar-nav-title">{{ __('Admin')}}</li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link " href="{{ route('admin.pages.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg>
                    {{ __('Pages') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>                
                </ul>
            </li>
            <li class="c-sidebar-nav-title ">{{ __('Manage Checklist') }}</li>
            @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show" >
                    <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit', $group->id)}}" >
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                        </svg>
                        {{ $group->name }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">

                        @foreach( $group->checklists as $checklist)
                            <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.checklists.edit', [$group,$checklist]) }}">
                                    <span class="c-sidebar-nav-icon"></span> 
                                        {{ $checklist->name }}
                                </a>
                            </li>                
                        @endforeach

                        <li class="c-sidebar-nav-item">
                                <a class="c-sidebar-nav-link"  href="{{ route('admin.checklist_groups.checklists.create', $group->id) }}">
                                <span class="c-sidebar-nav-icon"></span> 
                                {{-- {!!$group->id!!} --}}
                                    {{ __('Create new checklist') }}
                            </a>
                        </li>    
                        
                    </ul>
                </li>
            @endforeach

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link " href="{{ route('admin.checklist_groups.create') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>
                    </svg>
                {{ __('New Group')}}
                </a>
            </li>
        @endif

        {{-- <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> Base
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
            </ul>
        </li> --}}

        <li class="c-sidebar-nav-divider"></li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="login.html" target="_top" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg>
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>


{{-- 
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
<div class="c-sidebar-brand d-lg-down-none">
<svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
<use xlink:href="assets/brand/coreui.svg#full"></use>
</svg>
<svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
<use xlink:href="assets/brand/coreui.svg#signet"></use>
</svg>
</div>
<ul class="c-sidebar-nav ps">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="index.html">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
</svg> Dashboard<span class="badge badge-info">NEW</span></a></li>
<li class="c-sidebar-nav-title">Theme</li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
</svg> Colors</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="typography.html">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
</svg> Typography</a></li>
<li class="c-sidebar-nav-title">Components</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
</svg> Base</a>
<ul class="c-sidebar-nav-dropdown-items">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span class="c-sidebar-nav-icon"></span> Cards</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span class="c-sidebar-nav-icon"></span> Carousel</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span class="c-sidebar-nav-icon"></span> Collapse</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span class="c-sidebar-nav-icon"></span> Forms</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span class="c-sidebar-nav-icon"></span> Jumbotron</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span class="c-sidebar-nav-icon"></span> List group</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span class="c-sidebar-nav-icon"></span> Navs</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span class="c-sidebar-nav-icon"></span> Pagination</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span class="c-sidebar-nav-icon"></span> Popovers</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span class="c-sidebar-nav-icon"></span> Progress</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span class="c-sidebar-nav-icon"></span> Scrollspy</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span class="c-sidebar-nav-icon"></span> Switches</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span class="c-sidebar-nav-icon"></span> Tables</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span class="c-sidebar-nav-icon"></span> Tabs</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>
</ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
</svg> Buttons</a>
<ul class="c-sidebar-nav-dropdown-items">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span class="c-sidebar-nav-icon"></span> Buttons</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span class="c-sidebar-nav-icon"></span> Buttons Group</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span class="c-sidebar-nav-icon"></span> Dropdowns</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>
</ul>
</li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="charts.html">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
</svg> Charts</a></li>
<li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
</svg> Icons</a>
<ul class="c-sidebar-nav-dropdown-items">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span class="badge badge-success">Free</span></a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>
</ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
</svg> Notifications</a>
<ul class="c-sidebar-nav-dropdown-items">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span class="c-sidebar-nav-icon"></span> Alerts</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span class="c-sidebar-nav-icon"></span> Badge</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span class="c-sidebar-nav-icon"></span> Modals</a></li>
</ul>
</li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
</svg> Widgets<span class="badge badge-info">NEW</span></a></li>
<li class="c-sidebar-nav-divider"></li>
<li class="c-sidebar-nav-title">Extras</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-star"></use>
</svg> Pages</a>
<ul class="c-sidebar-nav-dropdown-items">
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="login.html" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
</svg> Login</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="register.html" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
</svg> Register</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="404.html" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
</svg> Error 404</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="500.html" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
</svg> Error 500</a></li>
</ul>
</li>
<li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
</svg> Download CoreUI</a></li>
<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/" target="_top">
<svg class="c-sidebar-nav-icon">
<use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
</svg> Try CoreUI<strong>PRO</strong></a></li>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div> --}}