@extends('layouts.breakdown-layout')
{{-- @isset($Engine->images)
    @section('bg-img', count($Engine->images) > 0 ? asset($Engine->images[0]->img) : asset('assets/img/toyota-logo.png'))
@endisset --}}
@section('bg-size', 'inherit')
@section('bg-color', '#777777')

@section('content')
    <div class="d-flex justify-content-center position-relative w-100 h-100">
        <div class="machine-container">
            <img src="/assets/img/engine1-1.png" class="w-100 h-100" alt="">
            <div class="" id="listKomponenMesin">
                @foreach ($EngineItems as $engineItem)
                    <div id="item-{{ $engineItem->id }}"
                        style="top:{{ $engineItem->posisi_x }}px;left:{{ $engineItem->posisi_y }}px;"
                        data-id="{{ $engineItem->id }}" class="item-component">
                        <div
                            class="circle {{ $engineItem->breakdown_possibility <= 50 ? 'bg-danger' : '' }} position-relative">
                            <div class="item-component-box d-none position-absolute">
                                <span>{{ $engineItem->nama }}</span>
                            </div>
                            @if ($engineItem->breakdown_possibility <= 50)
                                <span class="text-danger" style="position: absolute; left: 15px;">
                                    <i class="fas fa-exclamation-triangle fa-beat"></i>
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="detailsKomponen"></div>
@endsection

@push('js-breakdown')
    <script>
        const loadEngineComponentItem = (id) => {
            $.ajax({
                url: '/api/komponen-mesin?mesin_id=' + id,
                type: 'GET',
                success: function(data) {
                    renderEngineItem(data.data);
                    itemComponentClick();
                }
            })
        }

        const renderEngineItem = (data) => {
            let html = ''
            data.forEach(item => {
                html +=
                    `
            <div id="item-${item.id}" style="top:${item.posisi_x}px;left:${item.posisi_y}px;" data-id="${item.id}" class="item-component">`;
                if (item.breakdown_possibility < 50) {
                    html += `<div class="circle bg-danger"></div>`;
                } else {
                    html += `<div class="circle"></div>`;
                }
                html += `<div class="item-component-box d-none">
                    <span>${item.nama}</span>
                </div>`;

                if (item.breakdown_possibility < 50) {
                    html += `<span class="text-danger" style="position: absolute;left: 15px;">
                    <i class="fas fa-exclamation-triangle fa-beat"></i>
                </span>`;
                }
                html += `</div>`;
            })

            $('#listKomponenMesin').html(html)
        }

        loadEngineComponentItem(`{{ $Engine->id }}`)


        function itemComponentClick() {
            $('.item-component .circle').hover(function() {
                $(this).parent().find('.item-component-box').toggleClass('d-none');
            });

            $('.item-component .circle').click(function() {
                const elmDataId = $(this).parent().data('id');
                getDetailsKomponen(elmDataId);
                $('#detailsKomponen').removeClass('d-none');
            });
        }


        itemComponentClick()
    </script>
@endpush
