@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Detail Promo</div>
                    <div class="panel-body">

                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <a href="{{ url('/admin/promotions/' . $promotion->id . '/edit') }}" title="Ubah Data Promo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ubah</button></a>
                        {!! Form::open([
                            'method' => 'POST',
                            'url' => ['/admin/promotions/active', $promotion->id],
                            'style' => 'display:inline'
                        ]) !!}
                            @if($promotion->active == '0')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Aktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Aktifkan Produk',
                                    'onclick'=>'return confirm("Yakin ingin mengaktifkan?")'
                            )) !!}
                            @elseif($promotion->active == '1')
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Menonaktifkan', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Menonaktifkan Produk',
                                    'onclick'=>'return confirm("Yakin ingin menonaktifkan?")'
                            )) !!}
                            @endif
                        {!! Form::close() !!}

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID.</th><th>Kode Kupon</th><th>Judul</th><th>Deskripsi</th><th>Tanggal Berlaku / Tanggal Berakhir</th><th>Minimum Transaksi (Rp.)</th><th>Diskon (%)</th><th>Status</th><th>Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $promotion->id }}</td> <td> {{ $promotion->coupon }} </td><td> {{ $promotion->title }} </td><td>{{ $promotion->description }}</td><td>{{ date('d-m-Y', strtotime($promotion->starting_date)) }} <br> {{ date('d-m-Y', strtotime($promotion->end_date)) }}</td><td>{{ $promotion->minimum_payment }}</td><td>{{ $promotion->discount * 100 }}%</td>
                                        @if($promotion->active == '0')
                                        <td style="color:red;">Tidak Aktif</td>
                                        @elseif($promotion->active == '1')
                                            @if(strtotime($promotion->starting_date) <= strtotime(date('Y-m-d H:i:s')) && strtotime(date('Y-m-d H:i:s')) <= strtotime($promotion->end_date))
                                            <td style="color:green;">Aktif</td>
                                            @elseif(strtotime(date('Y-m-d H:i:s')) > strtotime($promotion->end_date) && strtotime(date('Y-m-d H:i:s')) > strtotime($promotion->starting_date))
                                            <td style="color:gray;">Sudah Kadaluarsa</td>
                                            @else
                                            <td style="color:blue;">Belum bisa digunakan</td>
                                            @endif
                                        @endif
                                        @if(count($promotion->image) >= 1)
                                            @php
                                                list($width, $height) = getimagesize(public_path($promotion->image));
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
                                                <img src="{{ asset($promotion->image) }}" alt="{{ $promotion->name }}" height="{{ $h }}" width="{{ $w }}">
                                            </td>
                                        @elseif(count($promotion->image) < 1)
                                            <td>
                                                <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $promotion->name }}" height="95" width="95">
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