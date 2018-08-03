@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Data Pengguna</div>
                    <div class="panel-body">
                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <br />
                        <br />
                        
                        {!! Form::model($user, [
                            'method' => 'POST',
                            'route' => ['admin.users.edit', $user->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.users.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection