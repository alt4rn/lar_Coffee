@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategori</div>
                    <div class="panel-body">

                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" title="Ubah Data Kategori"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                        {!! Form::open([
                            'method' => 'POST',
                            'url' => ['/admin/categories/active', $category->id],
                            'style' => 'display:inline'
                        ]) !!}
                            @if($category->active == '0')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Aktifkan Kategori',
                                    'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                            )) !!}
                            @elseif($category->active == '1')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Menonaktifkan Kategori',
                                    'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                            )) !!}
                            @endif
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/categories', $category->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Hapus Kategori',
                                    'onclick'=>'return confirm("Yakin ingin hapus kategori?")',
                                    'disabled' => $category->checkDelete($category->id)
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th> <th>Nama</th><th>Deskripsi</th><th>Status</th><th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $category->id }}</td> <td> {{ $category->name }} </td><td>{{ $category->description }}</td>
                                        <td>{!! $category->active == '0' ? 'Nonaktif' : 'Aktif'!!}</td>
                                        @php
                                            list($width, $height) = getimagesize(public_path($category->image));
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
                                        <td><img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="{{ $h }}" width="{{ $w }}"></td>
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