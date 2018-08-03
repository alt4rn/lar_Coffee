@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Kategori Produk Baru</div>
                    <div class="panel-body">
                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <br />
                        <br />

                        {!! Form::open(['route' => 'admin.categories', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.categories.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection