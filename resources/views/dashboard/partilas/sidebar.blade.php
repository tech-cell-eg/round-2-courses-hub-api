<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('adminthem')}}/img/user.jpg" alt=""
                     style="width: 40px; height: 40px;">
                <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{auth()->guard('admins')->user()->name}}</h6>
                <span>{{ auth()->guard('admins')->user()->roles->pluck('name')->first() }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('roles.index')}}" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Roles</a>
            <div class="nav-item dropdown">
                <a href="{{route('categories.index')}}" class="nav-link dropdown-toggle"><i
                            class="fa fa-laptop me-2"></i>Categories</a>
            </div>
            <a href="{{route('events.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Events</a>


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-keyboard me-2"></i>Courses
                    </a>
                    <div class="dropdown-menu bg-white border shadow">
                        <a href="{{route('courses.approval')}}" class="dropdown-item text-success">
                            <i class="fa fa-check-circle me-2"></i> Approved Courses
                        </a>
                        {{--                        {{ route('admin.courses.pending') }}--}}
                        <a href="{{route('courses.pending')}}" class="dropdown-item text-warning">
                            <i class="fa fa-hourglass-half me-2"></i> Pending Courses
                        </a>
                    </div>
                </div>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
