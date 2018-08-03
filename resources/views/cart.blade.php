@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="module">
            <div class="container">
            {!! Form::open(['method' => 'GET', 'url' => '/cart'])  !!}
                @if(count(Cart::content()))
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt">Troli</h1>
                    </div>
                </div>

                <hr class="divider-w pt-20">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped table-border checkout-table">
                            <tbody>
                            <tr>
                                <th class="hidden-xs">No.</th>
                                <th>Nama Produk</th>
                                <th class="hidden-xs">Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Hapus Produk</th>
                            </tr>
                            <?php $no = 1 ?>
                            @foreach(Cart::content() as $product)
                            <tr>
                                <td>{{ $no }}.</td>
                                <td>
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                        <h6 class="product-title font-alt">{{ $product->name }}</h5>
                                    </a>    
                                </td>
                                <td class="hidden-xs">
                                    <h5 class="product-title font-alt">Rp{{ number_format($product->price, 2, ",", ".") }}</h5>
                                </td>
                                <td>
                                    <input type="hidden" name="row_id[]" value="{{ $product->rowId }}">
                                    <input class="form-control" type="number" name="qty[]" value="{{ $product->qty }}" max="50" min="1"/>
                                </td>
                                <td>
                                    <h5 class="product-title font-alt">Rp{{ number_format($product->price * $product->qty, 2, ",", ".") }}</h5>
                                </td>
                                <td class="pr-remove"><a href="{{ route('cart.delete', ['row_id' => $product->rowId]) }}" title="Remove"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3 col-sm-offset-3">
                    <div class="form-group">
                        {!! Form::submit( 'Perbarui Troli', [
                            'class' => 'btn btn-block btn-round btn-d pull-right', 
                            'name' => 'submit-update', 
                            'value' => 'submitU'])
                        !!}
                    </div>
                </div>
                <hr class="divider-w">
                <div class="row mt-70">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="shop-Cart-totalbox">
                            <h4 class="font-alt">Harga</h4>
                            <table class="table table-striped table-border checkout-table">
                                <tbody>
                                <tr>
                                    <th>Sub Total</th>
                                    <td>Rp {{ Cart::subtotal() }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('cart.checkout') }}"><button class="btn btn-lg btn-block btn-round btn-d" type="submit" name="submit-checkout">Lanjutkan ke Pembayaran</button></a>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt">Troli belanja Anda kosong.</h1>
                        <a href="{{ url('products') }}"><h1 class="module-title font-alt" style="h1:hover{background-color: blue;}">Ayo mulai belanja!</h1></a>
                    </div>
                </div>    
                @endif
            {!! Form::close() !!}
            </div>
        </section>
@stop

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>