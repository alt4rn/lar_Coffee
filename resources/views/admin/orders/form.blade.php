<div class="form-group">
    {!! Form::label('re_name', 'Nama Penerima : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('re_name', null, ['class' => 'form-control', 'id' => 're_name']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('re_address', 'Alamat Penerima : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('re_address', null, ['class' => 'form-control', 'id' => 're_address']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('re_phone', 'Nomor Teleppon Penerima : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('re_phone', null, ['class' => 'form-control', 'id' => 're_phone']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('delivery_method', 'Metode Pengiriman : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if($order->delivery_method == 'take away')
            <input type="radio" name="delivery_method" value="take away" onclick="disableAddress()" checked> Bawa Pulang
            <input type="radio" name="delivery_method" value="GOFOOD" onclick="enableAddress()"> Dikirim
        @elseif($order->delivery_method == 'GOFOOD')
            <input type="radio" name="delivery_method" value="take away" onclick="disableAddress()"> Bawa Pulang
            <input type="radio" name="delivery_method" value="GOFOOD" onclick="enableAddress()" checked> Dikirim
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('sub_total', 'Sub Total : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('sub_total', null, ['class' => 'form-control', 'disabled' => 'true']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('delivery_cost', 'Biaya Pengiriman : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('delivery_cost', null, ['class' => 'form-control', 'disabled' => 'true', 'id' => 'delivery_cost']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('discount', 'Diskon : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('discount', null, ['class' => 'form-control', 'disabled' => 'true', 'id' => 'discount']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('total', 'Total : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('total', null, ['class' => 'form-control', 'disabled' => 'true', 'id' => 'total']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('status', 'Status : ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(empty($order->status))
            <select name="status" id="status">
                <option selected disabled>Pilih Status</option>
                <option value="not paid">Belum Dibayar</option>
                <option value="being processed">Sedang Diproses</option>
                <option value="ready to take">Siap Diambil</option>
                <option value="sending">Sedang Dikirim</option>
                <option value="done">Selesai</option>
                <option value="canceled">Batal</option>
            </select>
        @elseif(!empty($order->status))
            {!! Form::select('status', [
                    'not paid' => 'Belum Dibayar', 
                    'being processed' => 'Sedang Diproses',
                    'ready to take' => 'Siap Diambil',
                    'sending' => 'Sedang Dikirim',
                    'done' => 'Selesai',
                    'canceled' => 'Batal'
                    ], $order->status,
            ['class' => 'form-control', 'required' => 'required', 'id' => 'status' ]) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambahkan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>