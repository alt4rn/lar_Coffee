@extends('layouts.index')
@section('content')
<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <h4 class="font-alt mb-0">Pesanan</h4>
            <hr class="divider-w mt-10 mb-20">
            <div role="tabpanel">
                <ul class="nav nav-tabs font-alt" role="tablist">
                <li class="active"><a href="#latest" data-toggle="tab"><span class="icon-compass"></span> Transaksi Terakhir</a></li>
                <li><a href="#history" data-toggle="tab"><span class="icon-hourglass"></span> Riwayat Transaksi</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="latest">
                    @if(count($latest) < 1 || empty($latest))
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <h1 class="module-title font-alt">Saat ini, tidak ada pesanan yang sedang berjalan.</h1>
                                <a href="{{ route('product') }}"><h1 class="module-title font-alt" style="h1:hover{background-color: blue;}">Ayo mulai pesan!</h1></a>
                            </div>
                        </div>
                    @elseif(!empty($latest))
                        <table class="table table-bordless">
                            <thead>
                                <tr>
                                    <th>Tanggal Order</th> <th>Metode Pengambilan</th> <th>Biaya Pengiriman</th> <th>Status</th> <th>Total</th> <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latest as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    @if($item->delivery_method == 'take away')
                                    <td>Bawa Pulang</td>
                                    @elseif($item->delivery_method == 'GOFOOD')
                                    <td>Dikirim</td>
                                    @endif
                                    <td>Rp {{ number_format(str_replace(',','',$item->delivery_cost),2,'.',',') }}</td>
                                    @if($item->status == 'not paid')
                                    <td style="text-transform: capitalize;"><strong>Belum Dibayar</strong></td>
                                    @elseif($item->status == 'being processed')
                                    <td style="text-transform: capitalize;"><strong>Sedang Diproses</strong></td>
                                    @elseif($item->status == 'ready to take')
                                    <td style="text-transform: capitalize;"><strong>Siap Diambil</strong></td>
                                    @elseif($item->status == 'sending')
                                    <td style="text-transform: capitalize;"><strong>Sedang Dikirim</strong></td>
                                    @elseif($item->status == 'done')
                                    <td style="text-transform: capitalize; color: green;"><strong>Selesai</strong></td>
                                    @elseif($item->status == 'canceled')
                                    <td  style="text-transform: capitalize; color: red;"><strong>Batal</strong></td>
                                    @endif
                                    <td>Rp {{ number_format(str_replace(',','',$item->total),2,'.',',') }}</td>
                                    <td>
                                        <a href="{{ url('/order/detail/' . $item->id) }}" title="View Order"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button></a>
                                        {!! Form::open([
                                            'method' => 'POST',
                                            'route' => ['user.order.update', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                            @if($item->status == 'not paid' || $item->status == 'being processed')
                                            {!! Form::button('<i class="fa fa-remove" aria-hidden="true"></i> Batalkan', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs',
                                                    'title' => 'Cancel order',
                                                    'onclick'=>'return confirm("Cancel order?")',
                                            )) !!}
                                            @endif
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="tab-pane" id="history">
                    @if(count($history) < 1)
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <h3 class="module-title font-alt">Riwayat transaksi anda kosong.</h3>
                                <a href="{{ route('product') }}"><h3 class="module-title font-alt" style="h1:hover{background-color: blue;}">Ayo mulai belanja!</h3></a>
                            </div>
                        </div>
                    @elseif(!empty($history))
                        <table class="table table-bordless">
                            <thead>
                                <tr>
                                    <th>Tanggal Order</th> <th>Metode Pengambilan</th> <th>Biaya Pengiriman</th> <th>Status</th> <th>Total</th> <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    @if($item->delivery_method == 'take away')
                                    <td>Bawa Pulang</td>
                                    @elseif($item->delivery_method == 'GOFOOD')
                                    <td>Dikirim</td>
                                    @endif
                                    <td>Rp {{ number_format(str_replace(',','',$item->delivery_cost),2,'.',',') }}</td>
                                    @if($item->status == 'not paid')
                                    <td style="text-transform: capitalize;"><strong>Belum Dibayar</strong></td>
                                    @elseif($item->status == 'being processed')
                                    <td style="text-transform: capitalize;"><strong>Sedang Diproses</strong></td>
                                    @elseif($item->status == 'ready to take')
                                    <td style="text-transform: capitalize;"><strong>Siap Diambil</strong></td>
                                    @elseif($item->status == 'sending')
                                    <td style="text-transform: capitalize;"><strong>Sedang Dikirim</strong></td>
                                    @elseif($item->status == 'done')
                                    <td style="text-transform: capitalize; color: green;"><strong>Selesai</strong></td>
                                    @elseif($item->status == 'canceled')
                                    <td  style="text-transform: capitalize; color: red;"><strong>Batal</strong></td>
                                    @endif
                                    <td>Rp {{ number_format(str_replace(',','',$item->total),2,'.',',') }}</td>
                                    <td>
                                        <a href="{{ url('/order/detail/' . $item->id) }}" title="View Order"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop