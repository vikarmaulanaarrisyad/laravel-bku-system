<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('templates') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('templates') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        @php
            $menus = App\Models\Menu::with(['children', 'permissions'])
                ->whereNull('parent_id') // Ambil menu utama yang parent_id-nya null
                ->where(function ($query) {
                    $query
                        ->whereHas('roles', function ($q) {
                            $q->whereIn('name', auth()->user()->getRoleNames());
                        })
                        ->WhereHas('permissions', function ($q) {
                            $q->whereIn('name', auth()->user()->getAllPermissions()->pluck('name'));
                        });
                })
                ->get();
        @endphp

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ (auth()->user()->hasRole('admin') ? '/admin/' : '') . $menu->url }}"
                            class="nav-link">
                            <i class="nav-icon fas {{ $menu->icon }}"></i>
                            <p>
                                {{ $menu->name }}
                                @if ($menu->children->isNotEmpty())
                                    <!-- Cek apakah menu memiliki children -->
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        <!-- Sub-menu (child) -->
                        @if ($menu->children->isNotEmpty())
                            <!-- Jika menu memiliki children -->
                            <ul class="nav nav-treeview">
                                @foreach ($menu->children as $child)
                                    <!-- Cek permission untuk menu anak -->
                                    @if ($child->permissions->intersect(auth()->user()->permissions)->isNotEmpty())
                                        <li class="nav-item">
                                            <a href="{{ (auth()->user()->hasRole('admin') ? '/admin/' : '') . $child->url }}"
                                                class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ $child->name }}</p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
