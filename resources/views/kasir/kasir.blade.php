<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="stylesheet" href="{{asset('assets/css/kasir.css')}}">
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
</div>
{{-- Navbar head --}}

<form action="/kasir" method="POST" id="form-order">
    @csrf
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
                <div class="search-product-container">
                    <div class="search-box">
                        <ion-icon name="search-outline" class="logo-search-head"></ion-icon>
                        <input autofocus="autofocus" type="text" placeholder="Search Product" class="search-input">
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
    <div class="content-kasir">
        <section class="section-content padding-y-sm bg-default " id="body-kasir-cart">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 card padding-y-sm card " id="kotak-product">
                    <ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="pill" href="#">
                    <i class="fa fa-tags"></i> All</a></li>
                @foreach ( $category as $cat )
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                    <i class="fa fa-tags "></i> {{$cat->nama_category}}</a></li>
                @endforeach
            </ul>
            <div class="w-full d-flex" style="gap: 35px; flex-wrap: wrap">
                @foreach ($product as $produk)
                <figure class="card card-product" id="kasir-box-product" style="width: 300px">
                    <div class="img-wrap">
                        <img src="assets/images/items/3.jpg">
                        <a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
                    </div>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">{{$produk->nama_product}}</a>
                        <div class="action-wrap">
                            <a href="#" class="btn btn-primary btn-sm float-right item-product" prod-id="{{ $produk->id_product }}"> <i class="fa fa-cart-plus"></i> Add </a>
                            <div class="price-wrap h5">
                                <span class="price-new">{{$produk->harga_product}}</span>
                            </div> <!-- price-wrap.// -->
                        </div> <!-- action-wrap -->
                    </figcaption>
                </figure>
                @endforeach <!-- card // -->
            </div> <!-- col // -->
            <div class="pagination-produk">
                {{ $product->links('pagination::default')}}
            </div>
                </div>
                <div class="col-md-4">
            <div class="card">
                <span id="cart">
                    <table class="table table-hover shopping-cart-wrap">
                        <thead class="text-muted">
                        <tr>
                        <th scope="col">Item</th>
                        <th scope="col" width="120">Qty</th>
                        <th scope="col" width="120">Harga</th>
                        <th scope="col" class="text-right" width="200">Delete</th>
                        </tr>
                        </thead>
                        <tbody class="table-body-cart" id="table-data-item-cart">
                            @foreach($cartData as $cd)
                                <?php
                                    $productData = $cd->product;
                                ?>
                                <tr class='item-{{ $cd->id_cart }}'>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="" class="img-thumbnail img-xs"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate" id="text-product-cart">{{ $productData->nama_product }}</h6>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
                                            <button type="button" class="m-btn btn btn-default decrease-qty" cart-id="{{ $cd->id_cart }}" prod-id="{{ $cd->id_product }}"><i class="fa fa-minus"></i></button>
                                            <button type="button" class="m-btn btn btn-default" id="cart-item-{{ $cd->id_cart }}" disabled>{{ $cd->qty }}</button>
                                            <button type="button" class="m-btn btn btn-default increase-qty" cart-id="{{ $cd->id_cart }}" prod-id="{{ $cd->id_product }}"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">{{ $cd->harga_product }}</var>
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-outline-danger delete-item" cart-id="{{ $cd->id_cart }}" prod-id="{{ $cd->id_product }}"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </span>
            </div> <!-- card.// -->
            <div class="box">
            <div class="dlist-align">
              <label for="total-harga">Total : <span id="total-bayar">{{ $total_bayar }}</span></label>
            </div>
            <div class="dlist-align">
                <label for="kembalian-tunai">Kembalian : <span id="kembalian">0</span></label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="btn  btn-default btn-error btn-lg btn-block"><i class="fa fa-times-circle "></i> Cancel </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="btn btn-primary btn-lg btn-block" id="submit-btn"><i class="fa fa-shopping-bag"></i> Beli </a>
                </div>
            </div>
            </div> <!-- box.// -->
            <div class="input-barcode">
                <input type="text" class="input-barcode-box" id="input-barcode" placeholder="Masukan Barcode">
                <div class="customer-select">
                    <select name="id_customer" id="customer" class="customer-box-input-select">
                        @foreach ($dataCustomer as $dc )
                            <option value="{{ $dc->id_customer }}">{{ $dc->nama_customer }}</option>
                        @endforeach
                            <option value="kasir/tambah-customer" id="tambah-customer-select"><a href="kasir/tambah-customer" class="menambah-customer">+ Tambah Customer</a></option>
                    </select>
                    <div class="tunai-input">
                        <label for="tunai-kasir">Tunai :</label>
                        <input type="number" name="uang_tunai" id="uang-tunai" class="input-box-tunai" placeholder="Uang tunai">
                    </div>
                </div>
            </div>
                </div>
            </div>
            </div><!-- container //  -->
            </section>
    </div>
</form>

<script>
    document.getElementById('customer').addEventListener('change', function() {
  val = $( "#customer" ).val();

  console.log(val)
  if(val === 'kasir/tambah-customer') {
    window.location.replace('kasir/tambah-customer');
    }
});

</script>

<script>
    <script src="{{asset('asset-template/assets/js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset-template/assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset-template/assets/js/OverlayScrollbars.js')}}" type="text/javascript"></script>
</script>

<script>
    $(document).ready(function() {

        setTimeout(function(){
            $('body').addClass('loaded');
            $('h1').css('color','#222222');
        }, 3000);

        function ajaxRequest(prod_id , cust_id , qty , type){
            $.ajax({
                url : '/cart/add-item',
                dataType : 'json',
                type : 'get',
                data : {
                    id_product : prod_id,
                    id_customer : cust_id,
                    qty : qty,
                    type : type
                },
                success : function(data){
                    var find_item = $(document).find('#cart-item-'+data.cart_id).html();
                    let uang_tunai = $('#uang-tunai').val();
                    let total_bayar = data.total_bayar;
                    let kembalian = uang_tunai - total_bayar;
                    if (typeof find_item != 'undefined' && find_item != null && find_item != ''){
                        if (parseInt(data.cart.qty) != 0){
                            $(document).find('#cart-item-'+data.cart_id).html(data.cart.qty);
                        } else {
                            $(document).find('tr.item-'+data.cart_id).remove();
                        }
                    } else {
                        var cart_id = data.cart_id;
                        var item ='<tr class="item-'+ data.cart_id +'">';
                        item += '<td>'
                        item += '<figure class="media">';
                        item += '<div class="img-wrap"><img src="" class="img-thumbnail img-xs"></div>';
                        item += '<figcaption class="media-body">';
                        item += '<h6 class="title text-truncate" id="text-product-cart">'+ data.product.nama_product +'</h6>';
                        item += '</figcaption>';
                        item += '</figure>';
                        item += '</td>';
                        item += '<td class="text-center">';
                        item += '<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">';
                        item += '<button type="button" class="m-btn btn btn-default  decrease-qty" cart-id="'+ data.cart_id +'" prod-id="'+data.cart.id_product+'"><i class="fa fa-minus"></i></button>';
                        item += '<button type="button" class="m-btn btn btn-default"  disabled id="cart-item-'+ data.cart_id +'">'+ data.cart.qty +'</button>';
                        item += '<button type="button" class="m-btn btn btn-default  increase-qty" cart-id="'+ data.cart_id +'" prod-id="'+data.cart.id_product+'"><i class="fa fa-plus"></i></button>';
                        item += '</div>';
                        item += '</td>';
                        item += '<td>';
                        item += '<div class="price-wrap">';
                        item += '<var class="price">Rp. '+ data.cart.harga_product +'</var>';
                        item += '</div>';
                        item += '</td>';
                        item += '<td class="text-right">';
                        item += '<a href="#" class="btn btn-outline-danger delete-item" cart-id="'+ data.cart_id +'" prod-id="'+ data.cart.id_product +'"> <i class="fa fa-trash"></i></a>';
                        item += '</td>';
                        item += '</tr>';
                        console.log(item);
                        $(document).find('#table-data-item-cart').append(item);

                    }
                    $('#total-bayar').html(total_bayar);
                    $('#kembalian').html(kembalian);
                }
            });
        }

        $()

        $('.item-product').on("click" , function(){
            var prod_id = $(this).attr('prod-id');
            var cust_id = $('#customer').val();
            ajaxRequest(prod_id , cust_id , 1 , 'item-click');


        });

        $(document).on("click",'.increase-qty', function() {
            var prod_id = $(this).attr('prod-id');
            var cust_id = $('#customer').val();
            ajaxRequest(prod_id , cust_id , 1 , 'increase-item');
        });

        $(document).on("click",'.decrease-qty', function() {
            var prod_id = $(this).attr('prod-id');
            var cust_id = $('#customer').val();
            ajaxRequest(prod_id , cust_id , 1 , 'decrease-item');
        });

        $(document).on("click",'.delete-item', function() {
            var prod_id = $(this).attr('prod-id');
            var cust_id = $('#customer').val();
            ajaxRequest(prod_id , cust_id , 0 , 'delete');
        });
        $('#uang-tunai').on("keyup", function(){
            var total_bayar = $('#total-bayar').html();
            var kembalian = $('#kembalian').html();
            var uang_tunai = $(this).val();

            kembalian = uang_tunai - parseInt(total_bayar);
            $('#kembalian').html(kembalian);
        });
        $('#submit-btn').on("click", function(){
            $('#form-order').submit();
        });

        $('#input-barcode').on("keyup", function(e){
            if (e.which == 13){
                var barcode = $(this).val();
                var cust_id = $('#customer').val();
                ajaxRequest(barcode,cust_id,1,'item-click');
            }
        });


    });



</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
