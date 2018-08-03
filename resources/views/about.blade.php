@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="{{ asset("bg/about/ERK_2280.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Seputar Kami</h2>
                        <div class="module-subtitle font-serif">Kami adalah kedai kopi yang menyediakan berbagai jenis kopi & makanan menggunakan bahan-bahan impor, sehingga menciptakan cita rasa yang berbeda dengan kedai kopi lainnya.</div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="divider-w">
        <section class="module" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Our Advantages</h2>
                        <div class="module-subtitle font-serif"></div>
                    </div>
                </div>
                <div class="row multi-columns-row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-lightbulb"></span></div>
                            <h3 class="features-title font-alt">Ideas and concepts</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-bike"></span></div>
                            <h3 class="features-title font-alt">Optimised for speed</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-tools"></span></div>
                            <h3 class="features-title font-alt">Designs &amp; interfaces</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-gears"></span></div>
                            <h3 class="features-title font-alt">Highly customizable</h3>
                            <p>Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop