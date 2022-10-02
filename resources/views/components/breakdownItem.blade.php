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
                    <div id="item-{{ $engineItem->id }}" style="top:{{ $engineItem->posisi_x }}px;left:{{ $engineItem->posisi_y }}px;" data-id="{{ $engineItem->id }}" class="item-component">
                        <div class="circle {{($engineItem->breakdown_possibility > 50 || $engineItem->condition < 50) ? 'bg-danger' : 'bg-success'}}"></div>
                        <div class="item-component-box d-none">
                             <span>{{$engineItem->kode_komponen}}</span>
                        </div>
                        @if ($engineItem->breakdown_possibility > 50 || $engineItem->condition < 50)
                            <span class="text-danger" style="position: absolute; left: 15px;">
                                <i class="fas fa-exclamation-triangle fa-beat"></i>
                            </span>
                        @endif 
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
                    renderEngineTable(data.data);
                }
            })
        }

        const renderEngineItem = (data) => {
            let html = ''
            data.forEach(item => {
                html +=
                    `
            <div id="item-${item.id}" style="top:${item.posisi_x}px;left:${item.posisi_y}px;" data-id="${item.id}" class="item-component">`;
                if (item.breakdown_possibility > 50 || item.condition < 50) {
                    html += `<div class="circle bg-danger"></div>`;
                } else {
                    html += `<div class="circle bg-success"></div>`;
                }
                html += `<div class="item-component-box d-none">
                    <span>${item.kode_komponen}</span>
                </div>`;

                if (item.breakdown_possibility > 50 || item.condition < 50) {
                    html += `<span class="text-danger" style="position: absolute;left: 15px;">
                                <i class="fas fa-exclamation-triangle fa-beat"></i>
                            </span>`;
                }
                html += `</div>`;
            })

            $('#listKomponenMesin').html(html)
        }

        const renderEngineTable = (data) => {

            const tableDetailsElement = $('#tblInformationDetails');
            // get the table body
            const tableBody = tableDetailsElement.find('tbody');
            let html = '';
            data.forEach((item, index) => {
                html += `
                <tr>
                    <td>${index+1}</td>
                    <td>${item.kode_komponen}</td>
                    `;
                if (item.breakdown_possibility > 50 || item.condition < 50) {
                    html += `<td class="badge bg-danger">NG</td>`;
                } else {
                    html += `<td class="badge bg-success">OK</td>`;
                }
                html += `
                </tr>
                `;
            })

            tableBody.html(html);
        }

        setInterval(() => {
            loadEngineComponentItem(`{{ $Engine->id }}`)
        }, 5000);
    </script>
@endpush
