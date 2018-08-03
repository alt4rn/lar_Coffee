@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="{{ asset("bg/promo/ERK_1952.jpg") }}">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt">Promo</h2>
                        <div class="module-subtitle font-serif"></div>
                    </div>
                </div>
            </div>
        </section>

        <hr class="divider-w">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-1">
                @foreach($promotions as $promotion)
                    <div class="post">
                        <div class="post-thumbnail">
                          @if(empty($promotion->image))
                          <img src="{{ asset("bg/promo/ERK_1952.jpg") }}" alt="{{ $promotion->title }}">
                          @elseif(!empty($promotion->image))
                            @if(file_exists($promotion->image))
                            <img src="{!! asset($promotion->image) !!}" alt="{{ $promotion->title }}"/>
                            @else
                            <img src="{{ asset("bg/promo/ERK_1952.jpg") }}" alt="{{ $promotion->title }}">
                            @endif
                          @endif
                        </div>
                        <div class="post-header font-alt">
                            <h2 class="post-title">{{ $promotion->title }}</h2>
                            <div class="post-meta">Diskon&nbsp;{{ number_format($promotion->discount * 100) }}%| {{ $promotion->starting_date }} - {{ $promotion->end_date }} | Minimal Pembelian&nbsp;Rp{{ number_format($promotion->minimum_payment, 2, ",", ".") }} | Kode Kupon&nbsp;
                            </div>
                        </div>
                        <div class="post-entry">
                            <p>{{ $promotion->description }}</p>
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input class="form-control" type="text" id="couponCode" value="{{ $promotion->coupon }}" style="text-align:center;" readonly="">
                        </div>
                        <div class="post-more">
                            <button class="btn btn-success btn-round btn-block" type="button" onclick="copyClipBoard()">Salin Kode Kupon</button>
                        </div>
                    </div>
                @endforeach
                <div class="pagination font-alt">{{ $promotions->links() }}</div>
              </div>
            </div>
          </div>
        </section>
    </div>
@stop

<script>
  function copyClipBoard()
  {
    var couponCopy = document.getElementById("couponCode");
    couponCopy.select();
    document.execCommand("Copy");
    alert('Kupon berhasil disalin.')
  }
</script>