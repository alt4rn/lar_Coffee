@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Data Promo</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/promotions') }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <br />
                        <br />
                        
                        {!! Form::model($promotion, [
                            'method' => 'PATCH',
                            'route' => ['admin.produk.edit', $promotion->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.promotions.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection