<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>


    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cogs"></i>
            </a>
            <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                <a href="{{route('users.profile',\Illuminate\Support\Facades\Auth::user()->id)}}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="{{route('users.changePass',\Illuminate\Support\Facades\Auth::user()->id)}}" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('admin.logout')}}" class="dropdown-item"> <i class="nav-icon fas fa-arrow-circle-left mr-2"></i>Logout</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
