@extends('layouts.index')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="main">
        <section class="module bg-dark-60 shop-page-header" data-background="{{ asset("bg/product/ERK_2164.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Daftar Menu</h2>
                        <div class="module-subtitle font-serif">Eat delicious scrumptious tasty flavorful food.</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="module-small">
            <div class="container">
                {!! Form::open(['method' => 'GET', 'url' => '/products', 'name' => 'sort_id'])  !!}
                    <div class="col-sm-4 mb-sm-20">
                        @if(empty($sort))
                            <select class="form-control" name="sort_id">
                                <option disabled selected>Urutkan berdasarkan :</option>
                                <option value="1">Penjualan</option>
                                <option value="2">Terbaru</option>
                                <option value="3">Termurah</option>
                                <option value="4">Termahal</option>
                            </select>
                        @elseif(!empty($sort))
                            {!! Form::select('sort_id', [
                                    '1' => 'Penjualan', 
                                    '2' => 'Terbaru',
                                    '3' => 'Termurah',
                                    '4' => 'Termahal',
                                    ], $sort,
                            ['class' => 'form-control', 'required' => 'required']) !!}
                        @endif
                    </div>

                    <div class="col-sm-4 mb-sm-20">
                        @if(empty($category_sort))
                        <select class="form-control" name="category_sort_id">
                            <option disabled selected>Pilih kategori :</option>
                            <option value="1">Gourmet Coffee</option>
                            <option value="2">House Blend Grande Served Hot</option>
                            <option value="3">House Blend Grande Served Chill</option>
                            <option value="4">The Frappes</option>
                            <option value="5">Gourmet Tea Selection</option>
                            <option value="6">Fruits Freeze</option>
                            <option value="7">Pasta, Sandwich, & Companion</option>
                        </select>
                        @elseif(!empty($category_sort))
                            {!! Form::select('category_sort_id', [
                                    '1' => 'Gourmet Coffee', 
                                    '2' => 'House Blend Grande Served Hot',
                                    '3' => 'House Blend Grande Served Chill',
                                    '4' => 'The Frappes',
                                    '5' => 'Gourmet Tea Selection',
                                    '6' => 'Fruits Freeze',
                                    '7' => 'Pasta, Sandwich, & Companion'
                                    ], $category_sort,
                            ['class' => 'form-control', 'required' => 'required']) !!}
                        @endif
                    </div>

                    <div class="col-sm-3">
                        <button class="btn btn-block btn-round btn-g" type="submit">Cari</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>

        <hr class="divider-w">
        <section class="module-small">
            <div class="container">
                <div class="row multi-columns-row">
                    @foreach($products as $product)
                    <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="shop-item">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="shop-item-image">
                                        @if( ! empty($product->image))
                                            <img src="{!! asset($product->image) !!}" alt="{{ $product->product_name }}" style="width: 251.23px;height: 251.23px; object-fit: cover;"/>
                                        @elseif (empty($product->image))
                                            <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $product->product_name }}" style="height:251.23px;width:251.23px;"/>
                                        @endif
                                        <div class="shop-item-detail"><input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button class="btn btn-round btn-b">
                                                <span class="icon-basket">
                                                    Add To Cart
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                            <h4 class="shop-item-title font-alt">{{ $product->product_name }}</h4>
                                            Rp{{ number_format($product->product_price, 2, ",", ".") }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{--<div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>--}}
                        <div class="pagination font-alt">{{ $products->links() }}</div>
                    </div>
                </div>
            </div>
@stop