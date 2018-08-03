@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ulasan Produk</div>
                    <div class="panel-body">

                        <input type="hidden" value="{{ $number = 1 }}">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>No.</th><th>Nama Reviewer</th><th>Produk yang dinilai</th><th>Rating</th><th>Spam</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $item)
                                    <tr>
                                        <td>{{ $number }}.</td>
                                        <td>{{ $item->getReviewerName($item->user_id) }}</td>
                                        @if(!empty($item->productName))
                                            <td><a href="{{ url('/admin/products', $item->product_id) }}">{{ $item->productName }}</a></td>
                                        @else
                                            <td><a href="{{ url('/admin/products', $item->product_id) }}">{{ $item->getProductName($item->product_id) }}</a></td>
                                        @endif
                                        <td>{{ $item->rating }}</td>
                                        @if($item->spam == '0')
                                            <td>Bukan Spam</td>
                                        @else
                                            <td>Spam</td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/reviews/' . $item->id) }}" title="View Review"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</button></a>
                                            
                                            {!! Form::model($item, [
                                                'method' => 'POST',
                                                'route' => ['admin.reviews.edit', $item->id],
                                                'class' => 'form-horizontal',
                                                'files' => true
                                            ]) !!}
                                                @if($item->spam == 0)
                                                    {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Spam', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'name' => 'submit-spam',
                                                        'title' => 'Tandai sebagai spam',
                                                        'onclick'=>'return confirm("Tandai sebagai spam?")', 
                                                        'value' => '1'
                                                    )) !!}
                                                @elseif($item->spam == 1)
                                                    {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Bukan Spam', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-xs',
                                                        'name' => 'submit-spam',
                                                        'title' => 'Hapus tanda sebagai spam',
                                                        'onclick'=>'return confirm("Hapus tanda sebagai spam?")',
                                                        'value' => '0'
                                                    )) !!}
                                                @endif

                                            {!! Form::close() !!}
                                            
                                            {{--
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/reviews/', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Hapus Ulasan',
                                                        'onclick'=>'return confirm("Yakin ingin menghapus ulasan?")'
                                                )) !!}
                                            {!! Form::close() !!} --}}
                                        </td>
                                    </tr>
                                    <input type="hidden" value="{{ $number++ }}">
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $reviews->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection