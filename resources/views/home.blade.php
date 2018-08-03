@extends('layouts.index')
@section('content')
<section class="home-section home-full-height" id="home">
    <div class="hero-slider">
        <ul class="slides">
            <li class="bg-dark-30 restaurant-page-header bg-dark" style="background-image:url(&quot;bg/home/ERK_1731.jpg&quot;);">
                <div class="titan-caption">
                    <div class="caption-content">
                        <div class="font-alt mb-30 titan-title-size-1">Hello & Welcome</div>
                        <div class="font-alt mb-40 titan-title-size-4">Selamat datang di Coffee Grande</div><a class="section-scroll btn btn-border-w btn-round" href="{{ route('product') }}">Cek Menu Kami</a>
                    </div>
                </div>
            </li>
            <li class="bg-dark-30 restaurant-page-header bg-dark" style="background-image:url(&quot;bg/home/ERK_1995.jpg&quot;);">
                <div class="titan-caption">
                    <div class="caption-content">
                        <div class="font-alt mb-30 titan-title-size-2">Coffee Grande adalah kafe yang menyediakan berbagai menu menggunakan bahan impor.</div><a class="btn btn-border-w btn-round" href="{{ route('about') }}">Cari tahu mengenai Coffee Grande</a>
                    </div>
                </div>
            </li>
            <li class="bg-dark-30 restaurant-page-header bg-dark" style="background-image:url(&quot;bg/home/ERK_2181.jpg&quot;);">
                <div class="titan-caption">
                    <div class="caption-content">
                        <div class="font-alt mb-30 titan-title-size-1"> Take a look at</div>
                        <div class="font-alt mb-40 titan-title-size-3">our specialities</div><a class="section-scroll btn btn-border-w btn-round" href="#specialities">Learn More</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>

<div class="main">
    <section class="module" id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <div class="alt-module-subtitle"><span class="holder-w"></span>
                        <h5 class="font-serif">For your comfort</h5><span class="holder-w"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="module-title font-alt">Our Services</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="features-item">
                        <div class="features-icon"><span class="icon-clock"></span></div>
                        <h3 class="features-title font-alt">Opened 24/7</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="features-item">
                        <div class="features-icon"><span class="icon-streetsign"></span></div>
                        <h3 class="features-title font-alt">Free parking</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="features-item">
                        <div class="features-icon"><span class="icon-map"></span></div>
                        <h3 class="features-title font-alt">Central Location</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="features-item">
                        <div class="features-icon"><span class="icon-heart"></span></div>
                        <h3 class="features-title font-alt">High quality</h3>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="divider-w">
    <section class="module" id="specialities">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <div class="alt-module-subtitle"><span class="holder-w"></span>
                        <h5 class="font-serif">Take a look at</h5><span class="holder-w"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="module-title font-alt">Our Specialities</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                @foreach($categories as $category)
                <div class="col-sm-5 col-md-3 col-lg-4">
                    <div class="content-box">
                        <a href="{{ route('product.category', ['id' => $category->id]) }}">
                            <div class="content-box-image"><img src="{{ asset($category->image) }}" alt="{{ $category->category_name }}" style="width: 251.23px;height: 251.23px; object-fit: cover;"/></div>
                            <h3 class="content-box-title font-serif">{{ $category->name }}</h3>{{ $category->description }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="module module-video bg-dark-30" data-background="assets/images/restaurant/coffee_bg.png">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt mb-0">The Best Restaurant In Town. Enjoy Your Meal.</h2>
                </div>
            </div>
        </div>
        <div class="video-player" data-property="{videoURL:'https://www.youtube.com/watch?v=i_XV7YCRzKo', containment:'.module-video', startAt:3, mute:true, autoPlay:true, loop:true, opacity:1, showControls:false, showYTLogo:false, vol:25}"></div>
    </section>

    <section class="module" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5">
                    <div class="alt-module-subtitle"><span class="holder-w"></span>
                        <h5 class="font-serif">Most popular menu</h5><span class="holder-w"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="module-title font-alt">Popular Dishes</h2>
                </div>
            </div>
            <div class="row multi-columns-row">
                <div class="col-sm-6">
                    @foreach($popularDishes as $product)
                    <div class="menu">
                        <div class="row">
                            <div class="col-sm-8">
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}"><h4 class="menu-title font-alt">{{ $product->product_name }}</h4></a>
                                <a href="{{ route('product.category', ['id' => $product->category_id]) }}"><div class="menu-detail font-serif">{{ $product->getCategory($product->category_id) }}</div></a>
                            </div>
                            <div class="col-sm-4 menu-price-detail">
                                <h4 class="menu-price font-alt">{{ $product->product_price }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center"><a class="btn btn-border-d mt-50" href="{{ route('product') }}">Check our full menu</a></div>
        </div>
    </section>

    {{-- <section id="map-section">
        <div id="map"></div>
    </section> --}}
@stop