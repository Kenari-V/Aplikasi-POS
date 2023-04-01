<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Customer</title>
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <link rel="stylesheet" href="{{asset('assets/css/tambahcustomerkasir.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/bootstrap.css.map')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/OverlayScrollbars.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/responsive.css.map')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/ui.css')}}">
    <link rel="stylesheet" href="{{asset('asset-template/assets/css/ui.css.map')}}">
    <link href="github-widget/github-widget.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</head>
<body>
    <div class="header-navbar">
        <div class="header-kasir-content">
            <div class="head-nav">
                <div class="logo-nav-kasir">
                    <img src="{{asset('assets/image/167619572383.png')}}" alt="" class="logo-project">
                    <h4 class="text-logo-head">OhioShop</h4>
                </div>
                <div class="order-container">
                    <div class="Order">
                        <ion-icon name="cart-outline" class="logo-order-header"></ion-icon>
                        <a href="Order" class="order-text-header">Order</a>
                    </div>
                </div>
                <div class="profile-container">
                    <div class="profile-content-head">
                        <ion-icon name="person-circle-outline" class="profile-icon-head"></ion-icon>
                        <a href="Profile" class="profile-name-head">{{ Auth::user()->name }}</a>
                        <a href="/logout"><ion-icon name="log-out-outline" class="logout-icon"></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-tambah-product">
        <form action="/kasir/tambah-customer" method="POST" class="form-add-product">
            @csrf
            <div class="border-header-add-product">
                <h2>Tambah Customer</h2>
            </div>
            <div class="form-group">
                <label for="Nama Product" class="input-product-text">Nama Customer : </label>
                <input type="text" name="nama_customer" class="box-input-create" placeholder="Silahkan Masukan Nama Customer">
            </div>
            <div class="form-group">
                <label for="Harga Product" class="input-product-text">Contact : </label>
                <input type="text" name="contact" class="box-input-create" placeholder="Silahkan Masukan contact Customer">
            </div>
            <div class="form-group">
                <label for="Qty Product" class="input-product-text">Address : </label>
                <input type="text" name="address" class="box-input-create" placeholder="Silahkan Masukan Address Customer">
            </div>
            <div class="submit-create-data">
                <button type="submit" class="button-submit-create">Simpan</button>
            </div>
            <div class="submit-cancel-data">
                <a type="submit" href="/kasir" class="button-cancel-create">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        <script src="{{asset('asset-template/assets/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('asset-template/assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('asset-template/assets/js/OverlayScrollbars.js')}}" type="text/javascript"></script>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
