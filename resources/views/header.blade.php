<!DOCTYPE html>
<html lang="en">
<style>
    .loader {
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Personal Task Manager </title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/fvcon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
    
</head>
<body style="background-color:#E9E9E9">
    <!--  style="background-image: radial-gradient( circle farthest-corner at 92.3% 71.5%,  rgba(83,138,214,1) 0%, rgba(134,231,214,1) 90% );" -->
    <div id="app">
        <div id="sidebar" class="active"  > <!-- active -->
            <div class="sidebar-wrapper active"  style="background-color: white">
            <!-- #cce6ff -->
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <!-- <h5>Note Diary</h5>
                            <h6>My Life Works</h6> -->
                            <a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="Logo" srcset="" style="width:200px;height:50px"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                        
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu" >
                    <!-- <li class="sidebar-title">Menu</li> -->
                        <li class="sidebar-item active ">
                            <a href="/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="/works" class='sidebar-link'>
                                <i class="i bi-collection-fill"></i>
                                <span>Tasks</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/projects" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Projects</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/accounts" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Social Accounts</span>
                            </a>
                        </li>
                        <li class="sidebar-title text-muted">Notice Board</li>
                        <li class="sidebar-item">
                            <a href="/notepad" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Notepad</span>
                            </a>
                        </li>
                        <li class="sidebar-title text-muted">Authentications</li>
                        <li class="sidebar-item">
                            <a href="/users" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        
                    </ul>

                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar' style="">
            <!--background: linear-gradient(to left, #0099ff 0%, #ff99cc 70%);  
             background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
           background: linear-gradient(90deg, rgba(157,157,157,1) 0%, rgba(195,196,199,1) 13%); -->
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light " style="background: linear-gradient(to top left, #435ebe 0%, #435ebe 70%);">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3" style="color:white"></i>
                        </a>
                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> --}}
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                {{-- <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 " style="color:white">User</h6>
                                            <p class="mb-0 text-sm "style="color:white">Admin Panel</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('assets/images/faces/1.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, Admin!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="/profile"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
