<div class="form-group">
    {!! Form::label('title', 'Judul Promo: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Deskripsi Promo: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('coupon', 'Kode Kupon: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::text('coupon', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('starting_date', 'Tanggal berlaku: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        @if(empty($promotion->starting_date))
            {!! Form::date('starting_date', \Carbon\Carbon::now(), null, ['class' => 'form-control', 'required' => 'required']) !!}
        @elseif(!empty($promotion->starting_date))
            <input type="date" class="form-control" required = "required" value="{{ $promotion->starting_date }}">
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('end_date', 'Tanggal berakhir: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        @if(empty($promotion->end_date))
            {!! Form::date('end_date', \Carbon\Carbon::now(), null, ['class' => 'form-control', 'required' => 'required']) !!}
        @elseif(!empty($promotion->end_date))
            <input type="date" class="form-control" required = "required" value="{{ $promotion->end_date }}">
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('minimum_payment', 'Minimal Pembelian (Rp.): ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::number('minimum_payment', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('discount', 'Diskon (%): ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::number('discount', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('active', 'Status : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(empty($promotion->active))
            <select name="active" id="active">
                <option selected disabled>Pilih Status</option>
                <option value="0">Tidak Aktif</option>
                <option value="1">Aktif</option>
            </select>
        @elseif(!empty($promotion->active))
            {!! Form::select('active', [
                    '0' => 'Tidak Aktif',
                    '1' => 'Aktif'
                    ], $promotion->active,
            ['class' => 'form-control', 'required' => 'required', 'id' => 'active' ]) !!}
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('image', 'Image: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(!empty($submitButtonText))
            @if(!empty($promotion->image))
                @php
                    list($width, $height) = getimagesize(public_path($promotion->image));
                    if($width > $height) {
                        $orientation = "landscape";
                        $h = 65;
                        $w = 95;
                    } else {
                        $orientation = "portrait";
                        $h = 95;
                        $w = 65;
                    }
                @endphp
                <img src="{{ asset($promotion->image) }}" alt="{{ $promotion->name }}" height="{{ $h }}" width="{{ $w }}">
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            @else
                <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $product->product_name }}" style="height:251.23px;width:251.23px;"/>
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            @endif
        @else
            {!! Form::file('image', null, ['class' => 'form-control']) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>