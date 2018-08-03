@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="module bg-dark-30" data-background="{{ asset("bg/login/ERK_1733.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt mb-0">Login-Register</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                        <h4 class="font-alt">Login</h4>
                        <hr class="divider-w mb-10">

                        @if (Session::has('message-login'))
                            <div class="alert alert-danger alert-dismissible " style="font-size:15px;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ Session::get('message-login') }}
                            </div>
                        @endif

                        <form class="form" method="POST" action="{{ route('user.login') }}">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <input type="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                            </div>

                            <div class="form-group">
                                <input type="password" type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-info btn-round btn-block" type="submit">Login</button>
                                <div align="right" style="margin-top: 10px;">
                                    <a href=" {{ route('password.request') }} ">Lupa kata sandi?</a>
                                </div>
                            </div>
                            <div class="form-group"></div>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <h4 class="font-alt">Register</h4>
                        <hr class="divider-w mb-10">

                        <form class="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('registername') }}" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('registeremail') }}" placeholder="Alamat Email">
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-enter Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-round btn-b" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@stop