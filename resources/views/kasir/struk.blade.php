<html>
    <style type="text/css">
        .head {
            border-bottom: solid;
        }
        .foot {
            border-top : solid;
        }
    </style>
    <head>
        <title>Transaksi</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <td class="head">Ohio Shop</td>
                </tr>
                <tr>
                    <td>Nomor Order: {{ $order->id_order }}</td>
                </tr>
                <tr>
                    <td>Customer: {{ $order->customer->nama_customer }} </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="head">Nama Item</td>
                    <td class="head">x</td>
                    <td class="head">Qty</td>
                    <td class="head">:</td>
                    <td class="head">Harga</td>
                </tr>
                @php($total_bayar = 0)
                @foreach($order->orderDetail as $od)
                    <tr>
                        <td>{{ $od->product->nama_product }}</td>
                        <td>x</td>
                        <td>{{ $od->qty }}</td>
                        <td>:</td>
                        <td>{{ $od->harga_product }}</td>
                    </tr>
                    @php($total_bayar += $od->harga_product * $od->qty)
                @endforeach

                <tr>
                    <td class="foot">Total Bayar</td>
                    <td class="foot"></td>
                    <td class="foot"></td>
                    <td class="foot"></td>
                    <td class="foot">{{ $total_bayar }}</td>
                </tr>
                <tr>
                    <td>Uang Tunai</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $order->jumlah_bayar }}</td>
                </tr>
                <tr>
                    <td>Kembalian</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $order->jumlah_bayar - $total_bayar }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
