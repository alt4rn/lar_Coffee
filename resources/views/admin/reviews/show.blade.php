@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            @include('admin.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Review</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/reviews') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        {!! Form::model($review, [
                            'method' => 'POST',
                            'route' => ['admin.reviews.edit', $review->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                            @if($review->spam == 0)
                                {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Spam', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-warning btn-xs',
                                    'name' => 'submit-spam',
                                    'title' => 'Tandai sebagai spam',
                                    'onclick'=>'return confirm("Tandai sebagai spam?")'
                                )) !!}
                            @elseif($review->spam == 1)
                                {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Bukan Spam', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-warning btn-xs',
                                    'name' => 'submit-spam',
                                    'title' => 'Hapus tanda sebagai spam',
                                    'onclick'=>'return confirm("Hapus tanda sebagai spam?")'
                                )) !!}
                            @endif

                        {!! Form::close() !!}

                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/reviews', $review->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Hapus', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Hapus ulasan',
                                    'onclick'=>'return confirm("Yakin ingin menghapus ulasan?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama Reviewer</th><th>Produk yang dinilai</th><th>Nilai Keseluruhan</th><th>Komentar</th><th>Spam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $review->getReviewerName($review->user_id) }}</td><td>{{ $review->getProductName($review->product_id) }}</td><td>{{ $review->rating }}</td>
                                        <td> {{ $review->comment }} </td>
                                        <td>{!! $review->spam == '0' ? 'Bukan Spam' : 'Spam'!!}</td>
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