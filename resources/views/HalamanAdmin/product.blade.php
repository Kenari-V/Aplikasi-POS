<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <title>Product Ohio</title>
    <link rel="stylesheet" href="{{asset('assets/css/product.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                <div class="new-order-admin">
                    <i class="icon-add-new-order"><ion-icon name="add-outline"></ion-icon></i>
                    <a href="kasir" class="text-neworder">New Order</a>
                </div>
            </li>
            <li class="notification-headbar">
                <a href="" class="notification-icon"><ion-icon name="notifications-outline"></ion-icon></a>
            </li>
            <li class="profile-header">
                <i class="icon-profile"><ion-icon name="person-circle-outline"></ion-icon></i>
                <a href="" class="text-name-profile">masbro</a>
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
        <div class="Title-content-product">
            <h2 class="title-product">Daftar Product</h2>
            <div class="container-product">
                {{-- <form action="/Product" method="POST" class="form-produk">
                @csrf --}}
                <div class="box-action-headcontent">
                    <div class="button-tambah-data">
                        <ion-icon name="add-circle-outline" class="icon-tambah-data"></ion-icon>
                        <a class="create-data-product" href="Product/tambah-product">Tambah</a>
                    </div>
                    <form action="/Product" method="POST" class="form-produk">
                        @csrf
                    <div class="button-delete-data">
                        <ion-icon name="trash-outline" class="icon-delete-data"></ion-icon>
                        <input type="submit" name="" id="" value="Delete" class="delete-data">
                        <div id="item-delete"></div>
                    </div>
                </form>
                <div class="print-barcode">
                    <ion-icon name="barcode-outline" class="icon-print-barcode"></ion-icon>
                    <button onclick="cetakBarcode" ('{{ route('Product.print_barcode') }}') class="button-barcode">Print Barcode</button>
                </div>
                    <form action="/Product" method="GET" id="form-search">
                        <div class="search-data">
                            <a href=""><ion-icon name="search-outline" class="search-data-icon"></ion-icon></a>
                            <input type="search" name="search_product" id="search-input" placeholder="Search Produk" class="search-product-input">
                        </div>
                    </form>
                </div>
                <div class="line-product-tambah"></div>
                <table class="table-border">
                    <thead>
                        <tr>
                            <th><input type="checkbox" onchange="checkall(this)"></th>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Nama Category</th>
                            <th>Harga Produk</th>
                            <th>Qty</th>
                            <th>Barcode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody id="tbody">
                        <tr>
                        @if (count($product) > 0)
                            @php($i = 1)
                            @foreach ( $product as $produk )
                            <tr>
                                <td><input type="checkbox" name="ids[]" onclick="addDeleteData();" value="{{ $produk->id_product }}" class="checkbox-all"></td>
                                <td>{{$i}}</td>
                                <td><img src="{{asset('/image/'.$produk->photo_product)}}">
                                    {{$produk->nama_product}}</td>
                                <td>{{$produk->category->nama_category}}</td>
                                <td>{{$produk->harga_product}}</td>
                                <td>{{$produk->qty}}</td>
                                <td>{!! DNS1D::getBarcodeHTML("$produk->barcode", 'PHARMA') !!}
                                p - {{$produk->barcode}}</td>
                                <td><a href="/Product/{{$produk->id_product}}/editproduct"><ion-icon name="create-outline" class="icon-edit-table"></ion-icon></a></td>
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
                {{ $product->links('pagination::default')}}
            </div>
            </div>
        </div>
    </div>
</div>

<script>
</script>

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
<script>
    var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
    function checkall(checkboxku){
        if(checkboxku.checked == true){
            checkboxes.forEach(function(checkbox){
                checkbox.checked = true;
            });
        }
        else {
            checkboxes.forEach(function(checkbox){
                checkbox.checked = false;
            });
        }
        addDeleteData();
    }
</script>
<script>
    document.getElementById("search-input").addEventListener("keyup", function(e){
        if (e.keyCode == 13){
            document.getElementById("form-search").submit();
        }
    });


</script>

<script>
    function addDeleteData(){
        var data_cust = [];
        var a = document.querySelectorAll('[name="ids[]"]');
        document.getElementById("item-delete").innerHTML = '';
        var cust_data = '';
        for (var i = 0 ; i < a.length ; i++){
            if (a[i].checked){
                cust_data += '<input type="hidden" name="product_data[]" value="'+a[i].value+'">';
            }
        }
        document.getElementById("item-delete").innerHTML = cust_data;
    }

    console.log(data_cust);
</script>

<script>
//js buat barcode nanti
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
{{-- <script src="{{ asset('assets/js/jquary.min.js') }}"></script>
<script>
    $(document).ready(() => {
        $(document).on('keyup', '#search-input', () => {
            const search = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            type: 'post',
            url: `/Products/search`,
            data: {
                search
            },
            dataType: 'json',
            success: function(response) {
                $('#tbody').html("");
                $.each(response, function(key, product) {
                    $('#tbody').append(`
                        <tr>
                            <td><input type="checkbox" name="ids[]" onclick="addDeleteData();" value="${produk.id_product}" class="checkbox-all"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>${product.nama_product}</td>
                            <td>${product.harga_product}</td>
                            <td>${product.qty}</td>
                            <td>{!! DNS1D::getBarcodeHTML(${product.barcode}, 'PHARMA') !!}</td>
                            <td><a href="/Product/${product.id_product}/editproduct"><ion-icon name="create-outline" class="icon-edit-table"></ion-icon></a></td>
                        </tr>
                    `)
                });
            }
        })
    })})
</script> --}}
</body>
</html>
