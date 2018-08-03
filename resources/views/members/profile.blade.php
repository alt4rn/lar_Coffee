@extends('layouts.index')
@section('content')
    <div class="main"> 
        <section class="module bg-dark-60 shop-page-header" data-background="{{ asset("bg/profile/ERK_1730.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt mb-0">Profil</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <h4 class="font-alt mb-0">Profil Akun</h4>
                        <hr class="divider-w mt-10 mb-20">
                        <form class="form" role="form" method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input id="address" rows="3" type="text" class="form-control" name="address" value="{{ $user->address }}" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Nomor Telepon" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-round btn-b">
                                    Perbarui Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop