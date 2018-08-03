@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pengguna</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Tambah Pengguna Baru">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Pengguna
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-right', 'name' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari nama pengguna">
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
                                        <th>No.</th><th>Nama</th><th>Surel</th><th>Pangkat</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $no }}.</td>
                                        <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                                        @if ($item->isAdmin == '0')
                                        <td>User</td>
                                        @else
                                        <td>Admin</td>
                                        @endif
                                        @if ($item->active == '0')
                                        <td>Tidak Aktif</td>
                                        @else
                                        <td>Aktif</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id) }}" title="Lihat Pengguna"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Ubah Data Pengguna"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                                            {!! Form::open([
                                                'method' => 'POST',
                                                'url' => ['/admin/users/active', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                @if($item->active == '0')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Aktifkan Pengguna',
                                                        'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                                                )) !!}
                                                @elseif($item->active == '1')
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'title' => 'Menonaktifkan Pengguna',
                                                        'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                                                )) !!}
                                                @endif
                                            {!! Form::close() !!}

                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/users', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Hapus Pengguna',
                                                        'onclick'=>'return confirm("Yakin ingin hapus pengguna?")',
                                                        'disabled' => $item->checkDelete($item->id)
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{ $no++ }}">
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection