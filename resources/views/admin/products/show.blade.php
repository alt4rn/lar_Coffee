@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Produk</div>
                    <div class="panel-body">

                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <a href="{{ url('/admin/products/' . $product->id . '/edit') }}" title="Ubah Data Produk"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                        {!! Form::open([
                            'method' => 'POST',
                            'url' => ['/admin/products/active', $product->id],
                            'style' => 'display:inline'
                        ]) !!}
                            @if($product->active == '0')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Aktifkan Produk',
                                    'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                            )) !!}
                            @elseif($product->active == '1')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Menonaktifkan Produk',
                                    'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                            )) !!}
                            @endif
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/products', $product->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Hapus Produk',
                                    'onclick'=>'return confirm("Yakin ingin hapus produk?")',
                                    'disabled' => $product->checkDelete($product->id)
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th><th>Nama</th><th>Kategori</th><th>Deskripsi</th><th>Harga</th><th>Status</th><th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $product->id }}</td> <td> {{ $product->product_name }} </td><td> {{ $product->getCategory($product->category_id) }} </td><td>{{ $product->product_description }}</td><td>{{ $product->product_price }}</td>
                                        <td>{!! $product->active == '0' ? 'Nonaktif' : 'Aktif'!!}</td>
                                        @if(count($product->image) >= 1)
                                            @php
                                                list($width, $height) = getimagesize(public_path($product->image));
                                                if($width > $height) {
                                                    $orientation = "landscape";
                                                    $h = 65;
                                                    $w = 95;
                                                } else {
                                                    $orientation = "portrait";
                                                    $h = 95;
                                                    $w = 65;
                                                }
                                            @endphp
                                            <td>
                                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" height="{{ $h }}" width="{{ $w }}">
                                            </td>
                                        @elseif(count($product->image) < 1)
                                            <td>
                                                <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $product->name }}" height="95" width="95">
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection