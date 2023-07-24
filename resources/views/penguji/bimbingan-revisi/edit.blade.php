@extends('app')

@include('penguji.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('penguji.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <div class="row">
                    <div class="col-12">
                        <h3>Bimbingan Revisi</h3>

                        <hr />

                        
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection