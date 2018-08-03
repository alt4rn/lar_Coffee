<div class="form-group">
    {!! Form::label('name', 'Nama: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email', 'Surel: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('password', 'Kata Sandi: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(!empty($submitButtonText))
            {!! Form::password('password', ['class' => 'form-control']) !!}
        @else
            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Ulangi Kata Sandi: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(!empty($submitButtonText))
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        @else
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('isAdmin', 'Jabatan: ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    @if(!empty($user))
        <select name="isAdmin">
        @if($user->isAdmin == 1)
            <option value="1" selected>Admin</option>
            <option value="0">User</option>
        @else
            <option value="1">Admin</option>
            <option value="0" selected>User</option>
        @endif
        </select>
    @else
        <select name="isAdmin">
            <option value="1">Admin</option>
            <option value="0" selected>User</option>
        </select>
    @endif
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambahkan Pengguna', ['class' => 'btn btn-primary']) !!}
    </div>
</div>