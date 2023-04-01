<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <link rel="stylesheet" href="{{asset('assets/css/order.css')}}">
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
    <div class="table-order">
        <table class="table-border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>uang Tunai</th>
                    <th>Kembalian</th>
                </tr>
            </thead>
                <tbody>
                <tr>
                    @if (count($order) > 0)
                    @php($i = 1)
                    @foreach ($order as $od)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$od->customer->nama_customer}}</td>
                        <td>{{$od->jumlah_bayar}}</td>
                        <td>{{$od->kembalian}}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="ga-ada-product">Product Tidak Di temukan</td>
                    </tr>
                    @endif
                </tr>
        </table>
        <div class="pagination">
            {{ $order->links('pagination::default')}}
        </div>
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
