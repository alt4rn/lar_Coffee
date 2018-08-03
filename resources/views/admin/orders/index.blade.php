@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Pesanan</div>
                    <div class="panel-body">
                         <a href="{{ url('admin/orders/create') }}" class="btn btn-success btn-sm" title="Buat Pesanan Baru" hidden disabled="true">
                            <i class="fa fa-plus" aria-hidden="true"></i> Buat Pesanan
                        </a> 

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/orders', 'class' => 'navbar-form navbar-right', 'name' => 'search'])  !!}
                        <div class="input-group">
                            @if(empty($search))
                            <select name="search" class="form-control">
                                <option disabled selected>Urutkan berdasarkan : </option>
                                <option value="not paid">Belum Dibayar</option>
                                <option value="being processed">Sedang Diproses</option>
                                <option value="ready to take">Siap Diambil</option>
                                <option value="sending">Sedang Dikirim</option>
                                <option value="done">Selesai</option>
                                <option value="canceled">Dibatalkan</option>
                            </select>
                            @elseif(!empty($search))
                            {!! Form::select('search', [
                                    'not paid' => 'Belum Dibayar',
                                    'being processed' => 'Sedang Diproses',
                                    'ready to take' => 'Siap Diambil',
                                    'sending' => 'Sedang Dikirim',
                                    'done' => 'Selesai',
                                    'canceled' => 'Dibatalkan',
                                    ], $search,
                            ['class' => 'form-control']) !!}
                            @endif
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search">Cari</i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!} 

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No. Order</th><th>Nama Pemesan</th><th>Metode Pengambilan</th>
                                        <th>Total</th><th>Status</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $item)
                                    <tr>
                                        <td><a href="{{ url('/admin/orders/' . $item->id) }}">{{ $item->order_number }}</a></td>
                                        <td>{{ $item->getUserName($item->user_id) }}</td>
                                        @if($item->delivery_method == 'take away')
                                        <td>Bawa Pulang</td>
                                        @elseif($item->delivery_method == 'GOFOOD')
                                        <td>Dikirim</td>
                                        @endif
                                        <td>Rp {{ number_format($item->total, 2, ",", ".") }}</td>
                                        @if($item->status == 'not paid')
                                        <td>Belum Dibayar</td>
                                        @elseif($item->status == 'being processed')
                                        <td>Sedang Diproses</td>
                                        @elseif($item->status == 'ready to take')
                                        <td>Siap Diambil</td>
                                        @elseif($item->status == 'sending')
                                        <td>Sedang Dikirim</td>
                                        @elseif($item->status == 'done')
                                        <td style="color: green;">Selesai</td>
                                        @elseif($item->status == 'canceled')
                                        <td  style="color: red;">Batal</td>
                                        @endif
                                        <td>
                                            {{--<a href="{{ url('/admin/orders/' . $item->id) }}" title="Lihat Detail Pesanan"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>--}}
                                            @if($item->status == 'not paid' || $item->status == 'being processed' || $item->status == 'ready to take'  || $item->status == 'sending')
                                            <a href="{{ url('/admin/orders/' . $item->id . '/edit') }}" title="Ubah Data Pesanan"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                            @endif
                                            @if($item->status == 'not paid' || $item->status == 'being processed')
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'url' => ['/admin/orders/status', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Batal', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Batalkan Order',
                                                        'onclick'=>'return confirm("Yakin ingin batalkan pesanan?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @elseif($item->status == 'ready to take'  || $item->status == 'sending')
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'url' => ['/admin/orders/status', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Selesai', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-success btn-xs',
                                                        'title' => 'Selesaikan Order',
                                                        'onclick'=>'return confirm("Yakin ingin selesaikan pesanan?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $orders->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection