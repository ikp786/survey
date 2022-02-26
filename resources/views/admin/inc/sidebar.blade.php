<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('admin.dashboard')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img style="height: 40px;;" src="{{asset('public/assets/logo/logo.png')}}" alt=""> </i></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('assets/admin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Admin</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Questions</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('questions.create')}}" class="dropdown-item">Add</a>
                    <a href="{{route('admin.question.index','basic')}}" class="dropdown-item">Basic</a>
                    <a href="{{route('admin.question.index','advance')}}" class="dropdown-item">Advance</a>
                </div>
            </div>
            <a href="#" class="nav-item nav-link"><i class="fa fa-th me-2"></i>User List</a>
            <a href="#" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Result</a>
            <!--<a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
            <div class="nav-item dropdown">
                <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a> -->
                <!-- <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div> -->
            </div>
        </div>
    </nav>
</div>