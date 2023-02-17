<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <title>Product</title>
    <link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
</head>
<body>
<!-- navbar  -->
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
<div class="content-product">
    <div class="table-product">
        <table class="table-border">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Nama Category</th>
                    <th>Harga Produk</th>
                    <th>Qty</th>
                    <th>Barcode</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>test produk dummy</td>
                    <td>sepatu</td>
                    <td>13234</td>
                    <td>2</td>
                    <td>612313</td>
                </tr>
                <tr>
                    <td>test produk dummy 2</td>
                    <td>gitar</td>
                    <td>53131</td>
                    <td>3</td>
                    <td>602341</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script>
    var dropdown = document.querySelector('.dropdown-profile-2');

    dropdown.onclick = () => {
    document.querySelector(".dropdown-profile-dropdown").classList.toggle('active');
}

</script>
<script>
    var menu = document.querySelector('.toggle-sidebar');

    menu.onclick = () => {
    document.querySelector('.sidebar-menu').classList.toggle('active');
    menu.classList.toggle('active');
}

</script>
<script src=""></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
