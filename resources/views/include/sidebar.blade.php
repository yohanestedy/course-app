{{-- Sidebar Samping Kiri --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper" style="display: flex; flex-direction: column; height: 100%;">
        <div>
            <div class="sidebar-brand">
                <a href="/">Course App</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="/">CA</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="/"><i class="fas fa-rocket"></i>
                        <span>Dashboard</span></a></li>
                <li class="menu-header">Menus</li>
                <li class="{{ Route::is('dusun.index') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dusun.index') }}"><i class="fas fa-poop"></i> <span>Dusun</span></a></li>
                {{-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dropdown
                            1</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#"><i class="fas fa-fire"></i><span> Sub Menu 1</span></a>
                        </li>
                        <li><a class="nav-link" href="#">SubMenu 2</a></li>
                        <li><a class="nav-link" href="#">SubMenu 3</a></li>
                        <li><a class="nav-link" href="#">SubMenu 4</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dropdown
                            1</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#"><i class="fas fa-fire"></i><span> Sub Menu 1</span></a>
                        </li>
                        <li><a class="nav-link" href="#">SubMenu 2</a></li>
                        <li><a class="nav-link" href="#">SubMenu 3</a></li>
                        <li><a class="nav-link" href="#">SubMenu 4</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="#"><i class="fas fa-poop"></i> <span>Menu</span></a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-poop"></i> <span>Menu</span></a></li> --}}
            </ul>
        </div>
        <div class="mt-auto mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> LOGOUT
            </a>
        </div>
    </aside>
</div>
{{-- END Sidebar Samping Kiri --}}
