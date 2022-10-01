@extends('layouts.breakdown-layout')

@section('bg-img', asset('assets/img/car.png'))

@section('content')
<div class="">
    @foreach ($Engines as $engine)
        <div class="item-engine" style="top:{{$engine->posisi_y}}px; left:{{$engine->posisi_x}}px">
            <a href="/breakdown?mesin_id={{$engine->id}}" class="btn text-white bg-gray-transparent" style="width: {{$engine->item_width}}px; height: {{$engine->item_height}}px;">{{$engine->nama}}</a>
        </div>
    @endforeach
</div>
@endsection

@push('js-breakdown')
<script>
    console.log($('.item-engine').position()) 
</script>
@endpush