@extends('layouts.breakdown-layout')

@section('bg-img', asset('assets/img/car.png'))

@section('content')
<div class="" id="engine-items">
    @foreach ($Engines as $engine)
        <div class="item-engine" style="top:{{$engine->posisi_y}}px; left:{{$engine->posisi_x}}px">
            <a href="/breakdown?mesin_id={{$engine->id}}" class="fw-bold btn text-white bg-gray-transparent d-flex align-items-center" style="width: {{$engine->item_width}}px; height: {{$engine->item_height}}px;">
                <span class="w-100">
                    {{$engine->nama}} 
                    @if ($engine->danger)
                        <i class="fas fa-exclamation-triangle text-danger"></i>
                    @endif
                </span>
                
            </a>
        </div>
    @endforeach
</div>
@endsection

@push('js-breakdown')
<script>

    const loadEngineItem = () => {
        $.ajax({
            url: '/api/mesin',
            type: 'GET',
            success: function(data) {
                renderEngineElement(data.data)
            }
        })
    }

    const renderEngineElement = (data) => {
        let html = ''
        data.forEach(item => {
            html += `
            <div class="item-engine" style="top:${item.posisi_y}px; left:${item.posisi_x}px">
                <a href="/breakdown?mesin_id=${item.id}" class="fw-bold btn text-white bg-gray-transparent d-flex align-items-center" style="width: ${item.item_width}px; height: ${item.item_height}px;">
                    <span class="w-100">
                        ${item.nama}`;
            if (item.danger) {
                html += ` <i class="fas fa-exclamation-triangle text-danger fa-beat"></i>`;
            }
            html += `</span>                    
                </a>
            </div>`;
        })
        $('#engine-items').html(html);
    }

    setInterval(() => {
        loadEngineItem();
    }, 5000);
    
</script>
@endpush