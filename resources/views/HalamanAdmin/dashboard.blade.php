<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="github-widget/github-widget.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Loading-website -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
</div>
    <!-- navbar  -->
    </div>
    <div class="navbar-top">
        <div class="navbar-logo-menu">
            <!-- <i class="icon-headbar-menu"><ion-icon name="menu-outline"></ion-icon></i> -->
            <div class="logo-headbar"></div>
        </div>
        <div class="navbar-button-order">
            <ul class="navbar-header-list">
                <li class="new-order-header">
                    <i class="icon-add-new-order"><ion-icon name="add-outline"></ion-icon></i>
                    <a href="kasir" class="text-neworder">New Order</a>
                </li>
                <li class="notification-headbar">
                    <a href="" class="notification-icon"><ion-icon name="notifications-outline"></ion-icon></a>
                </li>
                <li class="profile-header">
                    <i class="icon-profile"><ion-icon name="person-circle-outline"></ion-icon></i>
                    <a href="" class="text-name-profile">Nama User</a>
                    <a href="#" class="dropdown-profile-2"><i class="icon-dropdown-profile"><ion-icon name="chevron-down-outline"></a></ion-icon></i>
                </li>
            </ul>
            <div class="dropdown-profile-dropdown">
                <ul>
                    <li class="profile-dropdown-nav"><a href="" class="dropdown-nav-text-profile"><ion-icon name="person-outline" class="dropdown-nav-icon-profile"></ion-icon>Profile</a></li>
                    <li class="logout-dropdown-nav"><a href="logout" class="dropdown-nav-text-logout"><ion-icon name="exit-outline" class="dropdown-nav-icon-logout"></ion-icon>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <label>
        <input type="checkbox" class="input-sidebar-menu">
        <div class="toggle-sidebar">
            <span class="topline-sidebar common"></span>
            <span class="middleline-sidebar common"></span>
            <span class="bottomline-sidebar common"></span>
        </div>
    <div class="sidebar-menu">
            <h1 class="menu-sidebar-title"><span style="color:blue">Ohio</span><span style="color:pink">Shop</span></h1>
            <ul class="sidebar-menu-parents">
                <li><a href="/" class="dashboard-menu"><ion-icon name="grid-outline" class="dashboard-icon-sidebar"></ion-icon>Dashboard</a></li>
                <li><a href="/Product" class="product-menu"><ion-icon name="cart-outline" class="product-icon-sidebar"></ion-icon>Product</a></li>
                <li><a href="/Customer" class="customer-menu"><ion-icon name="person-outline" class="customer-icon-sidebar"></ion-icon>Customer</a></li>
                <li><a href="/Category" class="category-menu"><ion-icon name="copy-outline" class="category-icon-sidebar"></ion-icon>Category</a></li>
                <li><a href="/Role" class="role-menu"><ion-icon name="people-outline" class="role-menu-icon-sidebar"></ion-icon>Role</a></li>
                <li><a href="/Laporan" class="laporan-menu"><ion-icon name="reader-outline" class="laporan-menu-icon-sidebar"></ion-icon>Laporan</a></li>
            </ul>
        </div>
    </label>
    <!-- content-dashboard -->
    <div class="content-dashboard">
        <div class="content-wrapper">

    </div>
</div>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
