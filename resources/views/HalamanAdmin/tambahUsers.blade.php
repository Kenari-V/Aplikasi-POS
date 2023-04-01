<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Users</title>
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <link rel="stylesheet" href="{{asset('assets/css/tambahUsers.css')}}">
</head>
<body>
    <div class="navbar-top">
        <div class="navbar-logo-menu">
            <!-- <i class="icon-headbar-menu"><ion-icon name="menu-outline"></ion-icon></i> -->
            <div class="logo-headbar"></div>
        </div>
        <div class="navbar-button-order">
            <ul class="navbar-header-list">
                <div class="new-order-header">
                    <li class="new-order-admin">
                        <i class="icon-add-new-order"><ion-icon name="add-outline"></ion-icon></i>
                        <a href="kasir" class="text-neworder">New Order</a>
                    </li>
                </div>
                <li class="notification-headbar">
                    <a href="" class="notification-icon"><ion-icon name="notifications-outline"></ion-icon></a>
                </li>
                <li class="profile-header">
                    <i class="icon-profile"><ion-icon name="person-circle-outline"></ion-icon></i>
                    <a href="" class="text-name-profile">{{ Auth::user()->name }}</a>
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
                <li><a href="/Role"class="role-menu"><ion-icon name="people-outline" class="role-menu-icon-sidebar"></ion-icon>Role</a></li>
                <li><a href="/Laporan" class="laporan-menu"><ion-icon name="reader-outline" class="laporan-menu-icon-sidebar"></ion-icon>Laporan</a></li>
            </ul>
        </div>
    </label>
    <div class="content-bg">
        <div class="content-tambah-product">
            <form action="/Role/tambah-users" method="POST">
                @csrf
            <div class="border-header-add-product">
                <div class="text-header-add-product">Tambah Users</div>
            </div>
            <div class="form-group">
                <label for="Nama Product" class="input-product-text">Nama User : </label>
                <input type="text" name="name" class="box-input-create" placeholder="Silahkan Masukan Nama " value="">
            </div>
            <div class="form-group">
                <label for="Harga Product" class="input-product-text">Email : </label>
                <input type="text" name="email" class="box-input-create" placeholder="Silahkan Masukan Email " value="">
            </div>
            <div class="form-group">
                <label for="Qty Product" class="input-product-text">Password : </label>
                <input type="password" name="password" class="box-input-create" placeholder="Silahkan Masukan Password Baru" value="">
            </div>
            <div class="form-group">
                <label for="Category Product" class="input-product-text">Users :</label>
                <select name="level" class="box-input-category">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Foto Product" class="input-product-text">Foto Profile : </label>
                <input type="file" name="photo_product" value="">
            </div>
            <div class="submit-create-data">
                <button type="submit" class="button-submit-create">Simpan</button>
            </div>
            <div class="submit-cancel-data">
                <a type="submit" href="/Role" class="button-cancel-create">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    var menu = document.querySelector('.toggle-sidebar');

    menu.onclick = () => {
    document.querySelector('.sidebar-menu').classList.toggle('active');
    menu.classList.toggle('active');
}

var dropdown = document.querySelector('.dropdown-profile-2');

dropdown.onclick = () => {
    document.querySelector(".dropdown-profile-dropdown").classList.toggle('active');
}
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
