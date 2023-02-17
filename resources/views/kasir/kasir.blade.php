<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="stylesheet" href="{{asset('assets/css/kasir.css')}}">
    <link href="github-widget/github-widget.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
<!-- Loading-website (By Slavus)-->
{{-- <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
</div> --}}
{{-- Navbar head --}}
    <div class="header-navbar">
        <div class="header-kasir-content">
            <div class="head-nav">
                <div class="logo-nav-kasir">
                    <img src="{{asset('assets/image/167619572383.png')}}" alt="" class="logo-project">
                    <h4 class="text-logo-head">OhioShop</h4>
                </div>
                <div class="new-order-container">

                </div>
            </div>
    </div>


<script>
    $(document).ready(function() {

    setTimeout(function(){
    $('body').addClass('loaded');
    $('h1').css('color','#222222');
}, 3000);

});
</script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
