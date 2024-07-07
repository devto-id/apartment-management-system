<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Apartment Management</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('plugins/adminlte/dist/img/user1-128x128.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ ($_menu ?? '') == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('approval.index') }}"
                        class="nav-link {{ ($_menu ?? '') == 'approval' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Approval
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('room.index') }}" class="nav-link {{ ($_menu ?? '') == 'room' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Room
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ ($_menu ?? '') == 'user' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>

                <li class="nav-header">ACCOUNT</li>


                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-link {{ ($_menu ?? '') == 'profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" data-content="form-logout">
                        @csrf
                        <a href="javascript:void(0)" class="nav-link text-danger" data-trigger="logout">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Log out
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
