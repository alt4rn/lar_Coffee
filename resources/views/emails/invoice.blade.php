<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	@if($order->status == 'not paid')
		<title>Tagihan Pemesanan {{ $order->order_number }}</title>
	@elseif($order->status == 'being processed')
		<title>Notifikasi Pemesanan {{ $order->order_number }}</title>
	@endif

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			body {
				background: #fff;
				background-image: none;
				font-size: 12px;
			}
			address{
				margin-top:15px;
			}
			h2 {
				font-size:28px;
				color:#cccccc;
			}
			.container {
				padding-top:30px;
			}
			.invoice-head td {
				padding: 0 8px;
			}
			.invoice-body{
				background-color:transparent;
			}
			.logo {
				padding-bottom: 10px;
			}
			.table th {
				vertical-align: bottom;
				font-weight: bold;
				padding: 8px;
				line-height: 20px;
				text-align: left;
			}
			.table td {
				padding: 8px;
				line-height: 20px;
				text-align: left;
				vertical-align: top;
				border-top: 1px solid #dddddd;
			}
			.well {
				margin-top: 15px;
			}
	</style>
</head>

<body>
<div class="container">
<table style="margin-left: auto; margin-right: auto" width="550">
	<tr>
		<td width="160">
			&nbsp;
		</td>

		<!-- Organization Name / Image -->
		<td align="right">
			<strong>Coffee Grande</strong>
		</td>
	</tr>
	<tr valign="top">
		<td style="font-size:28px;color:#cccccc;">
				Tagihan Pembelian
		</td>

		<!-- Organization Name / Date -->
		<td>
			<br><br>
			<strong>To:</strong> {{ $user->email }}
			<br>
			<strong>Date:</strong> {{ $order->created_at }}
		</td>
	</tr>
	<tr valign="top">
		<!-- Organization Details -->
		<td style="font-size:9px;">
			Coffee Grande<br>
            Jl. Raya Mulyosari No.290, Kalisari, Mulyorejo<br>
            Surabaya<br>
            0851-0347-6277<br>
            <a href="{{ route('home') }}">www.coffeegrande.co.id</a>
		</td>
		<td>
			<!-- Invoice Info -->
			<p>
				<strong>Daftar Produk yang dipesan:</strong> <br>
                @foreach(Cart::content() as $product)
                    {{ $product->name }} <br>
                    Rp {{ number_format($product->price, 2, ",", ".") }} <br>
                    {{ $product->qty }} <br>
                @endforeach
			</p>

            <p>
                <strong>Data Penerima:</strong> <br>
                {{ $order->re_name }} <br>
                @if($order->delivery_method == 'GOFOOD')
                    {{ $order->re_address }} <br>
                @endif
                {{ $order->re_phone }} <br>
            </p>

			<p>
				<center><strong>Terima kasih sudah berbelanja di Coffee Grande!</strong></center> <br>
				@if($order->status == 'not paid')
					Mohon segera selesaikan pembayaran Anda. <br>
					Pembayaran dapat dilakukan dengan Transfer BCA <br>
					<u>*input nomor rekening*</u> <br>
					a/n *input nama pemilik* <br>
					Setelah melakukan transfer, Anda bisa mengkonfirmasi pembayaran dengan : <br>
					1. Kirim bukti pembayaran melalui surel kami, *input surel Coffee Grande* <br>
					2. Kirim bukti pembayaran melalui nomor WhatsApp kami, *input nomor WA Coffee Grande* <br>
				@elseif($order->status == 'being processed')
					Pembayaran Anda menggunakan Transfer Bank telah berhasil. Pesanan Anda akan kami proses. <br>
					Anda bisa cek status pesanan melalui link <a href="{{ route('user.order.detail', ['id' => $order->id]) }}"><u>ini</u></a>.
				@endif
			</p>

			<br><br>

			<!-- Invoice Table -->
			<table width="100%" class="table" border="0">
				<tr>
					<th align="left">Deskripsi</th>
					<th align="right">Jumlah</th>
				</tr>

                <!-- Subtotal -->
                <tr>
                    <td>Subtotal :</td>
                    <td>Rp {{ number_format($order->sub_total, 2, ",", ".") }}</td>
                </tr>

				<!-- Biaya Pengiriman -->
                <tr>
                    <td>Metode Pengambilan : {{ $order->delivery_method }}</td>
                    <td>Rp {{ number_format($order->delivery_cost, 2, ",", ".") }}</td>
                </tr>

                <!-- Diskon -->
                <tr>
                    <td>Diskon</td>
                    <td>Rp {{ number_format( $total - $order->delivery_cost - str_replace(',','',Cart::subtotal()),2,'.',',') }}</td>
                </tr>

				<!-- Display The Final Total -->
				<tr style="border-top:2px solid #000;">
					<td style="text-align: right;"><strong>Total</strong></td>
					<td><strong>Rp {{ number_format($total, 2, ",", ".") }}</strong></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>
</body>
</html>