@extends('layouts.breakdown-layout')

@section('bg-img', asset('assets/img/engine1-1.png'))
@section('bg-size', "contain")
@section('bg-color', "#777777")

@section('content')
<div class="">
    @include('components.modalBreakdownDetails')
    <div class="container">
        <h1>Detail Component Engine  1</h1>
        <p>This all partition from engine 1</p>
    </div>
    
    <div class="d-flex position-relative justify-content-between p-5">
        <a href="/breakdown3" class="text-dark">
            <i class="fa fa-arrow-left"></i>
        </a>
        <a href="/breakdown4" class="text-dark">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
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