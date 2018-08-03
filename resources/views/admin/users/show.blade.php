@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pengguna</div>
                    <div class="panel-body">

                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Ubah Data Pengguna"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                        {!! Form::open([
                            'method' => 'POST',
                            'url' => ['/admin/users/active', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            @if($user->active == '0')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Aktifkan Pengguna',
                                    'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                            )) !!}
                            @elseif($user->active == '1')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Menonaktifkan Pengguna',
                                    'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                            )) !!}
                            @endif
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/users', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Hapus Pengguna',
                                    'onclick'=>'return confirm("Yakin ingin hapus pengguna?")',
                                    'disabled' => $user->checkDelete($user->id)
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th> <th>Nama</th><th>Alamat</th><th>No. Telp.</th><th>Email</th><th>Jabatan</th><th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $user->id }}</td> <td> {{ $user->name }} </td><td>{{ $user->address }}</td><td>{{ $user->phone }}</td><td> {{ $user->email }} </td><td>{!! $user->isAdmin == '0' ? 'User' : 'Admin'!!}</td> <td>{!! $user->active == '0' ? 'Nonaktif' : 'Aktif'!!}</td>
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