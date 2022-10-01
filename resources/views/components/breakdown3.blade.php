@extends('layouts.breakdown-layout')

@section('bg-img', asset('assets/img/engine1-1.png'))
@section('bg-size', "contain")
@section('bg-color', "#777777")

@section('content')
<div class="">
    <div class="">
        <div id="item-1" class="item-component">
            <div class="circle"></div>
            <div class="item-component-box d-none">
                <span>component 1</span>
            </div>
        </div>
    </div>
</div>
@endsection