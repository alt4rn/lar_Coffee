@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Pesanan {{ $order->order_number }}</div>
                    <div class="panel-body">

                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        @if($order->status == 'not paid' || $order->status == 'being processed' || $order->status == 'ready to take' || $order->status == 'sending')
                        <a href="{{ url('/admin/orders/' . $order->id . '/edit') }}" title="Ubah Data Pesanan"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                        @endif
                        @if($order->status == 'not paid' || $order->status == 'being processed')
                        {!! Form::open([
                            'method' => 'POST',
                            'url' => ['/admin/orders/status', $order->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Batal', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Batalkan Order',
                                    'onclick'=>'return confirm("Yakin ingin batalkan pesanan?")'
                            )) !!}
                        {!! Form::close() !!}
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-bordless">
                                <thead>
                                    <tr>
                                        <td colspan="3">
                                            <strong>Data Penerima</strong><br>
                                            Nama : {{ $order->re_name }} <br>
                                            @if(!empty($order->re_address))
                                            Alamat : {{ $order->re_address }} <br>
                                            @endif
                                            Nomor Telepon : {{ $order->re_phone }} <br>
                                        </td>
                                        <td colspan="2">
                                            <strong>Data Order</strong><br>
                                            Tanggal Pesan : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('Y-m-d') }} <br>
                                            Nama Pemesan : {{ $order->getUserName($order->user_id) }} <br>
                                            Metode Pengambilan : 
                                            @if($order->delivery_method == 'take away')
                                            Bawa Pulang <br>
                                            @elseif($order->delivery_method == 'GOFOOD')
                                            Dikirim <br>
                                            @endif
                                            @if($order->status == 'not paid')
                                            Status : Belum Dibayar <br>
                                            @elseif($order->status == 'being processed')
                                            Status : Sedang Diproses <br>
                                            @elseif($order->status == 'ready to take')
                                            Status : Siap Diambil <br>
                                            @elseif($order->status == 'sending')
                                            Status : Sedang Dikirim <br>
                                            @elseif($order->status == 'done')
                                            Status : <strong style="color: green;">Selesai</strong> <br>
                                            @elseif($order->status == 'canceled')
                                            Status : <strong style="color: red;">Batal</strong> <br>
                                            @endif
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <input type="hidden" value="{{ $number = 1 }}">

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No.</th><th>Produk yang dipesan</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderDetail as $item)
                                    <tr>
                                        <td>{{ $number }}.</td> 
                                        <td>
                                            <a href="{{ url('/admin/products', $item->product_id) }}">
                                                {{ $order->getProductName($item->product_id) }}
                                            </a>
                                        </td>
                                        <td>Rp {{ number_format($item->selling_price, 2, ",", ".") }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp {{ number_format($item->selling_price * $item->quantity, 2, ",", ".") }}</td>
                                    </tr>
                                    <input type="hidden" value="{{ $number++ }}">
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="4">Subtotal</th>
                                    <td>Rp {{ number_format($order->sub_total, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Biaya Pengiriman</th>
                                    <td>Rp {{ number_format($order->delivery_cost, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Diskon</th>
                                    <td>Rp {{ number_format($order->discount, 2, ",", ".") }}</td>
                                </tr>
                                <tr>
                                    <th colspan="4">Total</th>
                                    <td>Rp {{ number_format($order->total, 2, ",", ".") }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection