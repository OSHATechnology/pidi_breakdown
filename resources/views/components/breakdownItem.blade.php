@extends('layouts.breakdown-layout')
@section('bg-img', 'http://localhost:8000/assets/img/mesin/Kepala Silinder png/Kepala-Silinder.png')
@section('bg-size', "inherit")
@section('bg-color', "#777777")

@section('content')
<div class="">
    <div id="detailsKomponen"></div>
    <div class="">
        @foreach ($EngineItems as $engineItem)
        <div id="item-{{$engineItem->id}}" style="top:{{$engineItem->posisi_x}}px;left:{{$engineItem->posisi_y}}px;" data-id="{{$engineItem->id}}" class="item-component">
            <div class="circle"></div>
            <div class="item-component-box d-none">
                <span>{{$engineItem->nama}}</span>
            </div>
            @if ($engineItem->breakdown_possibility <= 50)
            <span class="text-danger" style="position: absolute;left: 15px;">
                <i class="fas fa-exclamation-triangle"></i>
            </span>
            @endif
        </div>
        @endforeach
    </div>
</div>

@endsection

@push('js-breakdown')
<script>
    
</script>   
@endpush