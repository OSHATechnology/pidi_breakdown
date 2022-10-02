@extends('layouts.breakdown-layout')
@section('bg-size', 'inherit')
@section('bg-color', '#777777')

@section('content')
    <div class="d-flex justify-content-center position-relative w-100 h-100">
        <div class="machine-container">
            <img src="/assets/img/engine1-1.png" class="w-100 h-100" alt="">
            <div class="" id="listKomponenMesin">
                {{-- @foreach ($Engines as $index => $item)
                    <a href="/breakdown?mesin_id={{$item->id}}" id="item-{{ $item->id }}"
                        style="top:{{ $item->posisi_x }}px;left:{{ $item->posisi_y }}px;"
                        data-id="{{ $item->id }}" class="item-component">
                        <div class="circle"></div>
                        <div class="item-component-box d-none">
                             <span>{{$item->nama}}</span>
                        </div>
                    </a>
                @endforeach --}}
            </div>
        </div>
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
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }

        const renderEngineElement = (data) => {
            let html = ''
            data.forEach(item => {
                html +=
                    `
            <a href="/breakdown?mesin_id=${item.id}" id="item-${item.id}" style="top:${item.posisi_x}px;left:${item.posisi_y}px;" data-id="${item.id}" class="item-component">`;
                if (item.danger) {
                    html += `<div class="circle bg-danger"></div>`;
                } else {
                    html += `<div class="circle bg-success"></div>`;
                }
                html += `<div class="item-component-box d-none">
                    <span>${item.nama}</span>
                </div>`;

                if (item.danger) {
                    html += `<span class="text-danger" style="position: absolute;left: 15px;">
                                <i class="fas fa-exclamation-triangle fa-beat"></i>
                            </span>`;
                }
                html += `</a>`;
            });

            $('#listKomponenMesin').html(html)
            
            itemComponentClick();
        }

        $(document).ready(function() {
            loadEngineItem();
        })
    </script>
@endpush
