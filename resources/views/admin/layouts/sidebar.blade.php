<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMS - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('template23/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template23/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#222d32">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}" style="background-color:#e08e0b; height:50px">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Departments</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Departments:</h6>
                        @if(isset(auth()->user()->role->permission['name']['department']['can-add']))

                        <a class="collapse-item" href="{{route('departments.create')}}" style="color:black">Create</a>
                        @endif
                        @if(isset(auth()->user()->role->permission['name']['department']['can-view']))

                        <a class="collapse-item" href="{{route('departments.index')}}" style="color:black">View</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>User</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Role:</h6>
                        @if(isset(auth()->user()->role->permission['name']['role']['can-add']))

                        <a class="collapse-item" href="{{route('roles.create')}}">Create Role</a>
                        @endif

                        @if(isset(auth()->user()->role->permission['name']['role']['can-view']))

                        <a class="collapse-item" href="{{route('roles.index')}}">View Role</a>
                        @endif

                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">User:</h6>
                        @if(isset(auth()->user()->role->permission['name']['user']['can-add']))

                        <a class="collapse-item" href="{{route('users.create')}}">Create User</a>
                        @endif

                        @if(isset(auth()->user()->role->permission['name']['user']['can-view']))

                        <a class="collapse-item" href="{{route('users.index')}}">View User</a>
                        @endif

                        <h6 class="collapse-header">Permission:</h6>
                        @if(isset(auth()->user()->role->permission['name']['permission']['can-add']))

                        <a class="collapse-item" href="{{route('permissions.create')}}">Create Permission</a>
                        @endif

                        @if(isset(auth()->user()->role->permission['name']['permission']['can-view']))

                        <a class="collapse-item" href="{{route('permissions.index')}}">View Permission</a>
                        @endif

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @if(isset(auth()->user()->role->permission['name']['leave']['can-list']))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Leave</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Leave:</h6>


                        <a class="collapse-item" href="{{route('leaves.create')}}">Create</a>


                        @if(isset(auth()->user()->role->permission['name']['leave']['can-view']))

                        <a class="collapse-item" href="{{route('leaves.index')}}">View</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo1">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Notice</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Notice:</h6>
                        @if(isset(auth()->user()->role->permission['name']['notice']['can-add']))

                        <a class="collapse-item" href="{{route('notices.create')}}" style="color:black">Create</a>
                        @endif


                        <a class="collapse-item" href="{{route('notices.index')}}" style="color:black">View</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            @if(isset(auth()->user()->role->permission['name']['mail']['can-add']))
            <li class="nav-item">
                <a class="nav-link" href="{{route('mails.create')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Mail</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
