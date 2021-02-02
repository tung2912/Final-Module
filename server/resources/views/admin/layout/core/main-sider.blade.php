<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('admin_resource/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Home Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style="width: 70px; height: 70px"
                     src="" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.dashboard')}}" class="d-block">
                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                    <br>
                    <i> <b>{{\Illuminate\Support\Facades\Auth::user()->role->name}}</b></i>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Main Dashboard
                        </p>
                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Models\RoleConstants::ROLE_ADMIN)
                    <li class="nav-item has-treeview  ">
                        <a href="#"
                           class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Manage User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.index')}}"
                                   class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.create')}}"
                                   class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link ">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Manage Cities
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cities.index') }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cities List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cities.create') }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add City </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link ">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Manage Estates
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('estates.index') }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Estates List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('estates.showEstateStatusById', 1) }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Waiting Estate </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('estates.showEstateStatusById', 2) }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Estate </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('estates.showEstateStatusById', 3) }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cancel Estate </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('estates.showEstateStatusById', 4) }}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Done Estate </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#"
                       class="nav-link">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Manage Incomes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Income List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#"
                       class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Subscribes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('subscribes.index')}}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subscribes List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#"
                       class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Clients
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clients List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="#"
                       class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Blogs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blogs.index')}}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blogs List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('blogs.create')}}"
                               class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-5">
                    <a href="{{route('admin.logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-arrow-circle-left"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
