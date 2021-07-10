@extends('layout')

@section('content')


<br>
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                About
            </h4>
        </div>

        <div class="card-body">
            <div class="col-12">
                <div class="m-t-50" >
                    <p>Tes Praktek PHP Programmer</p>
                    <p>PT. Nutech Integrasi</p><br>
                    <p>Rahmat Sandhy</p>
                </div>
                <a class="btn btn-lg btn-info" href="{{ url('barang/index') }}">Go to App</a>
            </div>
        </div>
    </div>
</div>

@endsection
