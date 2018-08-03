@extends('layouts.index')
@section('content')
    <section class="module">
        <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <h4 class="font-alt mb-0">Checkout</h4>
            <hr class="divider-w mt-10 mb-20">

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#orderProduct">Produk yang Dipesan</a></h4>
                        </div>
                        <div class="panel-collapse collapse in" id="orderProduct">
                            <div class="panel-body">
                            <form class="form" role="form" method="POST" url="/cart/checkout">
                                {{ csrf_field() }}
                                <table class="table table-striped table-border checkout-table">
                                    <tbody>
                                        <tr>
                                            <th class="hidden-xs">No.</th>
                                            <th>Nama Produk</th>
                                            <th class="hidden-xs">Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php $no = 1 ?>
                                        @foreach(Cart::content() as $product)
                                        <tr>
                                            <td>{{ $no }}.</td>
                                            <td>
                                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                                <h6 class="product-title font-alt">{{ $product->name }}</h6>
                                            </td>
                                            <td class="hidden-xs">
                                                <input type="hidden" name="selling_price[]" value="{{ $product->price }}">
                                                <h5 class="product-title font-alt">Rp {{ number_format($product->price, 2, ",", ".") }}</h5>
                                            </td>
                                            <td>
                                                <input type="hidden" name="quantity[]" value="{{ $product->qty }}">
                                                <h5 class="product-title font-alt">{{ $product->qty }}</h5>
                                            </td>
                                            <td>
                                                <h5 class="product-title font-alt">Rp {{ number_format($product->price*$product->qty, 2, ",", ".") }}</h5>
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <h4 class="font-alt">Data Penerima</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <input onclick="myData()" class="btn btn-warning btn-round btn-xs" id="datapri" type="button" title="Gunakan data pribadi sebagai data penerima." style="float:right;" value="Gunakan Data Pribadi">
                        </div>
                    </div>
                  <div class="form-group">
                    <input type="hidden" id="user_name" value="{{ Auth::user()->name }}">
                    <input class="form-control input-lg" id="re_name" name="re_name" type="text" placeholder="Nama Penerima"/>
                  </div>
                    <div class="col-sm-4">
                        <h6 class="font-alt">Metode Pengambilan :</h6>
                    </div>
                    <div class="form-control">
                        <input type="hidden" id="delivery_cost" value="0">
                        <input type="radio" name="delivery_method" value="take away" onclick="disableAddress()"> Bawa Pulang
                        <input type="radio" name="delivery_method" value="GOFOOD" onclick="enableAddress()"> Dikirim
                    </div>
                  <div class="form-group">
                    <input type="hidden" name="user_address" id="user_address" value="{{ Auth::user()->address }}">
                    <input class="form-control input-lg" id="re_address" name="re_address" type="text" placeholder="Alamat Penerima"/>
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="user_phone" value="{{ Auth::user()->phone }}">
                    <input class="form-control input-lg" id="re_phone" name="re_phone" type="tel" placeholder="Nomor Telepon Penerima"/>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="note" rows="5" placeholder="Keterangan" value="{{old('note')}}"></textarea>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            @if(empty($discount))
                                <input type="hidden" name="discount" id="discount" value="0">
                            @elseif(!empty($discount))
                                <input type="hidden" name="discount" id="discount" value="{{ $discount }}">
                            @endif
                            <input class="form-control" type="text" name="coupon" placeholder="Kode Kupon"/>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::submit('Pakai Kupon', [
                                'class' => 'btn btn-round btn-g',
                                'name' => 'submit-coupon',
                                'value' => 'submitC']) 
                            !!}
                        </div>
                    </div>
                  </div>
                  <div class="row mt-10">
                    <div class="col-sm-7 col-sm-offset-5">
                        <div class="shop-Cart-totalbox">
                            <h4 class="font-alt">Total Harga</h4>
                            <table class="table table-striped table-border checkout-table">
                                <tbody>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>Rp {{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <th>Ongkir</th>
                                    <td><label id="d_cost" style="font-weight: normal !important;">Rp 0.00</label></td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    @if(empty($discount))
                                        <td><label id="d_disc" style="font-weight: normal !important;">Rp 0.00</label></td>
                                    @elseif(!empty($discount))
                                        <td><label id="d_disc" style="font-weight: normal !important;">Rp {{ number_format(str_replace(',','',$discount),2,'.',',') }}</label></td>
                                    @endif
                                </tr>
                                <tr class="shop-Cart-totalprice">
                                    <input type="hidden" id="total" name="total" value="{{ Cart::subtotal() }}">
                                    <th>Total</th>
                                    @if(empty($discount))
                                        <td><label id="d_total" style="font-weight: normal !important;">Rp {{ number_format(str_replace(',','',Cart::subtotal()),2,'.',',') }}</label></td>
                                    @elseif(!empty($discount))
                                        <td><label id="d_total" style="font-weight: normal !important;">Rp {{ number_format(str_replace(',','',Cart::subtotal()) - $discount,2,'.',',') }}</label></td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                  <hr class="divider-w mt-5 mb-10">
                  {!! Form::submit('Lakukan Pemesanan', [
                    'class' => 'btn btn-primary btn-round btn-sm',
                    'name' => 'submit-order',
                    'value' => 'submitO',
                    'style' => 'float:right;']) 
                  !!}
                </form>
                <a href="{{ url()->previous() }}"><button class="btn btn-g btn-round btn-sm">Kembali</button></a>
            </div>
        </div>
        </div>
    </section>
@stop
<script>
    function myData(){
        $('#re_name').val($('#user_name').val());
        $('#re_address').val($('#user_address').val());
        $('#re_phone').val($('#user_phone').val());
    }
    function disableAddress(){
        $('#re_address').prop('disabled', true);
        $('#d_cost').html('Rp 0.00');
        $('#delivery_cost').val('0');
        var total = parseInt("{{ str_replace(',','',Cart::subtotal()) }}") - parseInt($('#discount').val()) + parseInt(document.getElementById('delivery_cost').value);
        document.getElementById('total').value = total;
        document.getElementById('d_total').innerHTML = "Rp " + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }
    function enableAddress(){
        $('#re_address').prop('disabled', false);
        $('#d_cost').html('Rp 15,000.00');
        $('#delivery_cost').val('15000');
        var total = parseInt("{{ str_replace(',','',Cart::subtotal()) }}") - parseInt($('#discount').val()) + parseInt(document.getElementById('delivery_cost').value);
        document.getElementById('total').value = total;
        document.getElementById('d_total').innerHTML = "Rp " + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }
</script>