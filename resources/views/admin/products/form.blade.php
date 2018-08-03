<div class="form-group">
    {!! Form::label('product_name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('product_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('product_description', 'Description: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('product_description', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('product_price', 'Price (Rupiah): ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::number('product_price', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('category_id', "Product's Category: ", ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        @if(empty($product->category_id))
            <select name="category_id" class="form-control" required="true">
                <option value="1">Gourmet Coffee</option>
                <option value="2">House Blend Grande Served Hot</option>
                <option value="3">House Blend Grande Served Chill</option>
                <option value="4">The Frappes</option>
                <option value="5">Gourmet Tea Selection</option>
                <option value="6">Fruits Freeze</option>
                <option value="7">Pasta, Sandwich, & Companion</option>
            </select>
        @else
            {!! Form::select('category_id', [
                    '1' => 'Gourmet Coffee', 
                    '2' => 'House Blend Grande Served Hot',
                    '3' => 'House Blend Grande Served Chill',
                    '4' => 'The Frappes',
                    '5' => 'Gourmet Tea Selection',
                    '6' => 'Fruits Freeze',
                    '7' => 'Pasta, Sandwich, & Companion'
                    ], $product->category_id,
            ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
        </select>
    </div>
</div>
<div class="form-group">
    {!! Form::label('image', 'Image: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(!empty($submitButtonText))
            @if(!empty($product->image))
                @php
                    list($width, $height) = getimagesize(public_path($product->image));
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
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" height="{{ $h }}" width="{{ $w }}">
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