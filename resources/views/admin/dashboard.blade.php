@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Selamat datang di halaman Admin Coffee Grande.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
