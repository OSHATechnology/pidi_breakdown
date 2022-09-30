@extends('layouts.breakdown-layout')


@section('bg-img', asset('assets/img/car.png'))

@section('content')
<div class="">
    <div class="d-flex p-lg-5 gap-2 p-5 align-items-center">
        <div class="w-100 text-center">
            <button type="button" class="btn btn-lg btn-custom-1  fw-bold border-color-gold h-80"><a href="/breakdown3" class="text-white">Engine 1</a></button>
        </div>
        <div class="d-flex flex-column flex-grow-0 gap-4 w-50" style="margin-left: 20px">
            <button type="button" class="btn btn-lg btn-custom-1  fw-bold border-color-gold" style="height: 30vh"><a href="/breakdown4" class="text-white">Engine 2</a></button>
            <button type="button" class="btn btn-lg btn-custom-1  fw-bold border-color-gold" style="height: 30vh"><a href="/breakdown5" class="text-white">Engine 3</a></button>
        </div>

    </div>
</div>
@endsection