@extends('layouts.index')
@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <input type="hidden" value="{{ $number = 1 }}">
                    <h4 class="font-alt mb-0">Detail Pesanan</h4>
                    <hr class="divider-w mt-10 mb-20">
                    <table class="table table-bordless">
                        <thead>
                            <tr>
                                <th colspan="3">Status Pesanan : {{ $orderStatus }}</th>
                                <th colspan="1"><strong>Tanggal Order : </strong>{{ Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</th>
                                <th colspan="1">
                                    <a href="{{ url()->previous() }}" title="Kembali"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-circle-o-left"></i> Kembali</button></a>
                                    @if($order->status != 'canceled')
                                        {!! Form::open([
                                            'method' => 'POST',
                                            'route' => ['user.order.update', $order->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            {!! Form::button('<i class="fa fa-remove" aria-hidden="true"></i> Batal', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Batalkan pesanan',
                                                    'onclick'=>'return confirm("Yakin ingin batalkan pesanan ini?")',
                                                    'disabled' => ($order->status == 'not paid' || $order->status == 'being processed') ? false : true 
                                            )) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </th>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <strong>Data penerima : </strong><br>
                                    {{ $order->re_name }} <br>
                                    @if(!empty($order->re_address)){{ $order->re_address }} <br>@endif
                                    {{ $order->re_phone }} <br>
                                </td>
                                <td colspan="3">
                                    <strong>Tambahan Keterangan : </strong><br>
                                    @if(!empty($order->note)) {{ $order->note }} @else <i>Tidak ada.</i> @endif
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>No.</th> <th>Barang yang dipesan</th> <th>Harga</th> <th>Jumlah</th> <th>Subtotal</th> @if($reviewB == true)<th>Action</th>@endif
                            </tr>
                            @foreach($detail as $item)
                                <tr>
                                    <td>{{ $number }}.</td>
                                    <td>{{ $order->getProductName($item->product_id) }}</td>
                                    <td>Rp {{ number_format(str_replace(',','',$item->selling_price),2,'.',',') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp {{ number_format(str_replace(',','',($item->quantity * $item->selling_price)),2,'.',',') }}</td>
                                    {{--@if($order->status != 'not paid' || $order->status != 'canceled')--}}
                                    @if($reviewB == true)
                                        <td><a href="{{ url('order/review/' . $item->order_id . '/' . $item->product_id) }}" title="Review Product"><button class="btn btn-info btn-xs"><i class="fa fa-pencil-square"></i> Review</button></a></td>
                                    @endif
                                </tr>
                                <input type="hidden" value="{{ $number++ }}">
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Subtotal</th>
                                <td>Rp {{ number_format(str_replace(',','',$order->sub_total),2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <th colspan="3">Metode Pengiriman</th>
                                <td style="text-transform: capitalize"> <i> @if($order->delivery_method == 'take away') Bawa Pulang @else Dikirim @endif </i> </td>
                            </tr>
                            <tr>
                                <th colspan="4">Biaya Pengiriman</th>
                                <td>Rp {{ number_format(str_replace(',','',$order->delivery_cost),2,'.',',') }}</td>
                            </tr>
                            <tr>
                                <th colspan="4">Total</th>
                                <td><strong>Rp {{ number_format(str_replace(',','',$order->total),2,'.',',') }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop