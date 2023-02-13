<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('assets/image/icon.png')}}" type="image/icon type">
    <title>Ohio Tambah Product</title>
</head>
<body>
<div class="content-tambah-product">
    <form action="/product/tambah-product" method="POST">
        <div class="form-group">
            <label for="Nama Product">Foto Product : </label>
            <input type="file" name="photo_product">
        </div>
        <div class="form-group">
            <label for="Nama Product">Nama Product : </label>
            <input type="text" name="nama_product">
        </div>
        <div class="form-group">
            <label for="Nama Product">Harga Product : </label>
            <input type="text" name="harga_product">
        </div>
        <div class="form-group">
            <label for="Nama Product">Qty : </label>
            <input type="text" name="qty">
        </div>
        <div class="form-group">
            <label for="Nama Product">Barcode :</label>
            <input type="text" name="barcode_product">
        </div>
        <div class="form-group">
            <label for="Nama Product">Nama Product : </label>
            <input type="text" name="nama_product">
        </div>
    </form>
</div>
</body>
</html>
