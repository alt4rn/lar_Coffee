@extends('layouts.index')
@section('content')
    <div class="main">
    <hr class="divider-w mt-10 mb-5">
        <section class="module">
            <div class="container">
                <div class="row">
                <form action="{{ route('cart.add') }}" method="POST">
                    {{ csrf_field() }}
                    @if(!empty($product->image))
                        <div class="col-sm-6 mb-sm-40"><a class="gallery" href="{{ asset($product->image) }}"><img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}"/></a>
                        </div>
                    @else
                    <div class="col-sm-6 mb-sm-40"><a class="gallery" href=""><img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $product->product_name }}"/></a>
                    </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="product-title font-alt">{{ $product->product_name }}</h1>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12"><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span><a class="open-tab section-scroll" href="#reviews"> {{ count($product->reviews) }} reviews</a>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="price font-alt"><span class="amount">Rp{{ number_format($product->product_price, 2, ",", ".") }}</span></div>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="description">
                                    <p>{{ $product->product_description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-4 mb-sm-20">
                                <input class="form-control input-lg" type="number" name="quantity" value="1" max="40" min="1" required="required"/>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="col-sm-8"><button class="btn btn-round btn-b">Tambahkan ke Troli</button></div>
                        </div>
                        <div class="row mb-20">
                            <div class="col-sm-12">
                                <div class="product_meta">Categories: <a href="{{ route('product.category', ['id' => $product->category_id]) }}">{{ $product->getCategory($product->category_id) }}</a></div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>
        <hr class="divider-w">
        <section class="module-small">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Produk Terkait</h2>
                    </div>
                </div>
                <div class="row multi-columns-row">
                   @foreach($relatedProduct as $rp)
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="shop-item">
                            <div class="shop-item-image">
                                @if(!empty($rp->image))
                                    <img src="{{ asset($rp->image) }}" alt="{{ $rp->name }}" style="width: 251.23px;height: 251.23px; object-fit: cover;"/>
                                @else
                                <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $rp->product_name }}" style="height:251.23px;width:251.23px;"/>
                                @endif
                                <div class="shop-item-detail"><a class="btn btn-round btn-b" href="{{ route('cart.add') }}"><span class="icon-basket">Add To Cart</span></a></div>
                            </div>
                            <div class="detail">
                                <a href="{{ route('product.detail', ['id' => $rp->id]) }}">
                                    <h4 class="shop-item-title font-alt">{{ $rp->product_name }}</h4>
                                    Rp{{ number_format($rp->product_price, 2, ",", ".") }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@stop