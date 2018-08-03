@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Produk</div>
                    <div class="panel-body">
                        <a href="{{ url('admin/products/create') }}" class="btn btn-success btn-sm" title="Tambah Produk Baru">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Produk
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/products', 'class' => 'navbar-form navbar-right', 'name' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari nama produk">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search">Cari</i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                        <input type="hidden" value="{{ $no = 1 }}">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No.</th><th>Nama</th><th>Kategori</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{ $no }}.</td>
                                        <td><a href="{{ url('/admin/products', $item->id) }}">{{ $item->product_name }}</a></td>
                                        <td>{{ $item->getCategory($item->category_id) }}</td>
                                        @if ($item->active == '0')
                                        <td>Tidak Aktif</td>
                                        @else
                                        <td>Aktif</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/products/' . $item->id) }}" title="Lihat Produk"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>
                                            <a href="{{ url('/admin/products/' . $item->id . '/edit') }}" title="Ubah Data Produk"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'url' => ['/admin/products/active', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                @if($item->active == '0')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Aktifkan Produk',
                                                        'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                                                )) !!}
                                                @elseif($item->active == '1')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Menonaktifkan Produk',
                                                        'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                                                )) !!}
                                                @endif
                                            {!! Form::close() !!}

                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/products', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Hapus Produk',
                                                        'onclick'=>'return confirm("Yakin ingin hapus produk?")',
                                                        'disabled' => $item->checkDelete($item->id)
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{ $no++ }}">
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $products->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection