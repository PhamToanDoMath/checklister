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

            <li class="c-sidebar-nav-divider"></li>
            <li class="c-sidebar-nav-title">{{ __('Pages')}}</li>
            @foreach(\App\Models\Page::all() as $page)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link " href="{{ route('admin.pages.edit', $page) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                        </svg>
                        {{ $page->title }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>                
                    </ul>
                </li>
            @endforeach

        @endif


        <li class="c-sidebar-nav-divider"></li>
        <li class="c-sidebar-nav-title">{{ __('Other')}}</li>
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
