@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Promo</div>
                    <div class="panel-body">
                        <a href="{{ url('admin/promotion/create') }}" class="btn btn-success btn-sm" title="Add New Promo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Buat Promo Baru
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/promotions', 'class' => 'navbar-form navbar-right', 'name' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Isi kode kupon...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search">Cari</i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <input type="hidden" value="{{ $number = 1 }}">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No.</th><th>Kode Kupon</th><th>Judul</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($promotions as $item)
                                    <tr>
                                        <td>{{ $number }}.</td>
                                        <td><a href="{{ url('/admin/promotions', $item->id) }}">{{ $item->coupon }}</a></td>
                                        <td>{{ $item->title }}</td>
                                        @if($item->active == '0')
                                        <td style="color:red;">Tidak Aktif</td>
                                        @elseif($item->active == '1')
                                            @if(strtotime($item->starting_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime(date('Y-m-d H:i:s')) <= strtotime($item->end_date))
                                            <td style="color:green;">Aktif</td>
                                            @elseif(strtotime(date('Y-m-d H:i:s')) > strtotime($item->end_date) && strtotime(date('Y-m-d H:i:s')) > strtotime($item->starting_date))
                                            <td style="color:gray;">Sudah Kadaluarsa</td>
                                            @else
                                            <td style="color:blue;">Belum bisa digunakan</td>
                                            @endif
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/promotions/' . $item->id) }}" title="Lihat Detail Promo"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>
                                            <a href="{{ url('/admin/promotions/' . $item->id . '/edit') }}" title="Ubah Data Promo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'url' => ['/admin/promotions/active', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                @if($item->active == '0')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Aktifkan Promo',
                                                        'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                                                )) !!}
                                                @elseif($item->active == '1')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Menonaktifkan Promo',
                                                        'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                                                )) !!}
                                                @endif
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{ $number++ }}">
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $promotions->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection