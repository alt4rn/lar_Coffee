<div class="form-group">
    {!! Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Description: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('image', 'Image: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(!empty($submitButtonText))
            @if(!empty($category->image))
                @php
                    list($width, $height) = getimagesize(public_path($category->image));
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
                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" height="{{ $h }}" width="{{ $w }}">
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            @else
                <img src="https://vignette.wikia.nocookie.net/feud8622/images/7/75/No_image_available.png/revision/latest?cb=20170116005915" alt="{{ $product->product_name }}" style="height:251.23px;width:251.23px;"/>
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            @endif
        @else
            {!! Form::file('image', null, ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>