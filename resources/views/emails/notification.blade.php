<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <title>Pesanan {{ $order->order_number }}</title>

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
				Pesanan Baru
		</td>

		<!-- Organization Name / Date -->
		<td>
			<br><br>
			<strong>To:</strong> {{ $admin->email }}
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
                <strong>Data Pemesan:</strong> <br>
                {{ $user->name }} <br>
                {{ $user->email }} <br>
                {{ $user->phone }} <br>
            </p>

			<p>
				<center><strong>{{ $admin->name }}, Anda mendapatkan pesanan baru.</strong></center> <br>
                Anda mendapatkan pesanan baru dari {{ $user->name }}. Mohon perhatikan jika pemesan sudah melakukan pembayaran atau belum. <br>
                Anda bisa melakukan perubahan status pesanan melalui link <a href="{{ route('admin.orders.edit', ['id' => $order->id]) }}"><u>berikut ini</u></a>.
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
                    <td style="color: green;">Rp {{ number_format( $order->total - $order->delivery_cost - str_replace(',','',Cart::subtotal()),2,'.',',') }}</td>
                </tr>

				<!-- Display The Final Total -->
				<tr style="border-top:2px solid #000;">
					<td style="text-align: right;"><strong>Total</strong></td>
					<td><strong>Rp {{ number_format($order->total, 2, ",", ".") }}</strong></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>
</body>
</html>