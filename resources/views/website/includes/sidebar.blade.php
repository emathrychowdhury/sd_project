<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            {{ Session::get('username') }}
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/') }}">Dashboard</a>
    </li>

    <!-- Divider -->
    {{-- sidebar for admin --}}
    @if (Session::get('userrole') == 'admin')
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true"
                aria-controls="collapseTwo1">Manage session</a>
            <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('sessions') }}">List</a>
                    <a class="collapse-item" href="{{ URL::to('create-session') }}">Add</a>
                </div>
            </div>
        </li>

        <!-- Course  -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true"
                aria-controls="collapseTwo2">Manage Course</a>
            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('courses') }}">List</a>
                    <a class="collapse-item" href="{{ URL::to('create-course') }}">Add</a>
                </div>
            </div>
        </li>

        <!-- Assign Teacher -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true"
                aria-controls="collapseTwo3">Assign Course Teacher</a>
            <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('assign-teacher') }}">List</a>
                    <a class="collapse-item" href="{{ URL::to('create-assign-teacher') }}">Add</a>
                </div>
            </div>
        </li>
    @endif

    {{-- sidebar for teacher --}}
    @if (Session::get('userrole') == 'teacher')
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">See students</a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('sessions') }}">List</a>
                    <a class="collapse-item" href="{{ URL::to('create-session') }}">Add</a>
                </div>
            </div>
        </li>
    @endif

    {{-- sidebar for student --}}
    @if (Session::get('userrole') == 'student')

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">Project Idea Form</a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ URL::to('projects') }}">List</a>
                    <a class="collapse-item" href="{{ URL::to('create-project') }}">Add</a>
                </div>
            </div>
        </li>
        
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
