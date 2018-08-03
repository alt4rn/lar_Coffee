@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ubah Data Pesanan</div>
                    <div class="panel-body">
                        <a href="{{ url()->previous() }}" title="Kembali ke Halaman Sebelumnya"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</button></a>
                        <input onclick="myData()" class="btn btn-info btn-xs" id="datapri" type="button" title="Gunakan data pribadi sebagai data penerima." style="float:right;" value="Gunakan Data Pemesan">
                        <br />
                        <br />
                        
                        {!! Form::model($order, [
                            'method' => 'POST',
                            'route' => ['admin.orders.update', $order->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.orders.form', ['submitButtonText' => 'Perbarui'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function myData(){
        $('#re_name').val("{{ $order->getUserName($order->user_id) }}");
        $('#re_address').val("{{ $order->getUserAddress($order->user_id) }}");
        $('#re_phone').val("{{ $order->getUserPhone($order->user_id) }}");
    }
    function disableAddress(){
        $('#re_address').prop('disabled', true);
        document.getElementById("re_address").required = false;
        $('#delivery_cost').val('0');
        var total = parseInt("{{ $order->sub_total }}") + parseInt("{{ $order->discount }}") + parseInt($('#delivery_cost').val());
        document.getElementById('total').value = total;
    }
    function enableAddress(){
        $('#re_address').prop('disabled', false);
        document.getElementById("re_address").required = true;
        $('#delivery_cost').val('15000');
        var total = parseInt("{{ $order->sub_total }}") + parseInt("{{ $order->discount }}") + parseInt($('#delivery_cost').val());
        document.getElementById('total').value = total;
    }
</script>