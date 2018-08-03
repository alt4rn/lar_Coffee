@extends('layouts.index')
@section('content')
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <input type="hidden" value="{{ $number = 1 }}">
                    <h4 class="font-alt mb-0">Review Produk Pesanan</h4>
                    <hr class="divider-w mt-10 mb-20">
                    <a href="{{ url()->previous() }}" title="Kembali"><button class="btn btn-warning btn-xs">Kembali</button></a>
                    {!! Form::open(['action' => ['ReviewController@userInput', $product->id]]) !!}
                        <table class="table table-bordless">
                            <thead>
                                <tr>
                                    <td>
                                        <strong>Barang yang dipesan : </strong>{{ $product->product_name }}<br>
                                    </td>
                                    <td>
                                        {!! Form::label('rating', 'Rating : ', ['class' => 'col-md-4 control-label']) !!} 
                                        @if(empty($review->rating))
                                            <select name="rating">
                                                <option selected disabled>Bagaimana kualitas produk ini?</option>
                                                <option value="1">Sangat Buruk</option>
                                                <option value="2">Buruk</option>
                                                <option value="3">Cukup</option>
                                                <option value="4">Baik</option>
                                                <option value="5">Sangat Baik</option>
                                            </select>
                                        @elseif(!empty($review->rating))
                                            {!! Form::select('rating', [
                                                    '1' => 'Sangat Buruk', 
                                                    '2' => 'Buruk',
                                                    '3' => 'Cukup',
                                                    '4' => 'Baik',
                                                    '5' => 'Sangat Baik'
                                                    ], $review->rating,
                                            ['class' => 'form-control', 'required' => 'required', 'disabled' => 'true']) !!}
                                        @endif
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <td colspan="2">
                                    {!! Form::label('comment', 'Ulasan terhadap produk ini : ', ['class' => 'col-md-4 control-label']) !!} <br>
                                    @if(!empty($review->comment))
                                        {!! Form::textarea('comment', $review->comment, ['class' => 'form-control', 'required' => 'required', 'disabled' => 'true']) !!}
                                    @elseif(empty($review->comment))
                                        <textarea name="comment" class="form-control" rows="7" placeholder="Minimal 20 karakter"></textarea>
                                    @endif
                                </td>
                            </tbody>
                            <tfoot>
                                @if(empty($review))
                                    <td>{!! Form::submit('Kirim', ['class' => 'btn btn-primary', 'style' => 'float: right;']) !!}</td>
                                @endif
                            </tfoot>
                        </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop