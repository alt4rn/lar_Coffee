@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="module bg-dark-60 shop-page-header" data-background="assets/images/shop/product-page-bg.jpg">
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
                <form method="post" action="{{ route('product.selectcat') }}">
                    {{ csrf_field() }}

                    <div class="col-sm-4 mb-sm-20">
                        <select class="form-control" id="selectSort" name="sort">
                            <option selected="selected" value="Normal">Default Sorting</option>
                            <option value="1">Popular</option>
                            <option value="2">Latest</option>
                            <option value="3">High Price</option>
                            <option value="4">Low Price</option>
                        </select>
                    </div>

                    <div class="col-sm-3 mb-sm-20">
                        <select class="form-control" name="category_id">
                            <option value="0">All</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }} ({{ count($category->products()) }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>
                    </div>
                </form>
            </div>
        </section>
        <hr class="divider-w">
        <section class="module-small">
            <div class="container">
                <div class="row multi-columns-row">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        @foreach($products as $product)
                            {{--<div class="shop-item">--}}
                                {{--<div class="shop-item-image"><img src="{{ asset('$product->images()->file_name->first()') }}" alt="{{ $product->product_name }}"/>--}}
                                    {{--<div class="shop-item-detail"><a class="btn btn-round btn-b"><span class="icon-basket">Add To Cart</span></a></div>Rp{{ number_format($product->product_price, 2, ",", ".") }}--}}
                                {{--</div>--}}
                                {{--<h4 class="shop-item-title font-alt"><a href="{{ route('product.detail', ['c_id' => $category->id, 'p_id' => $product->id]) }}">{{ $product->product_name }}</a></h4>--}}
                            {{--</div>--}}
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pagination font-alt"><a href="#"><i class="fa fa-angle-left"></i></a><a class="active" href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#"><i class="fa fa-angle-right"></i></a></div>
                    </div>
                </div>
            </div>
@stop

{{--<script>--}}
{{--$('#selectSort', '#selectCategory').change(function(){--}}
{{--var sort = $('#selectSort').val();--}}
{{--var category = $('#selectCategory').val();--}}

{{--if(category && location) {--}}
{{--window.location.href = "{{ route('product.sort', ['s_id' => sort, 'c_id' => category]) }}"--}}
{{--}--}}
{{--});--}}
{{--</script>--}}