    <div class="component-details-popup">
        <div class="popup-backdrop" style="position:absolute;">
            <div class="bg-dark rounded p-4">
                <div class="d-flex">
                    @if ($data->breakdown_possibility > 50 || $data->condition < 50)
                    <div class="text-center mb-4">
                        <span style="color: #dddddd">Need Action to repair</span>
                    </div>
                    @endif
                    <div class="text-end ms-auto">
                        <button type="button" class="btn btn-outline-light m-0 border-0 btn-sm" id="component-details-close"><i class="fas fa-times"></i></button>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-center mb-2">
                    <img src="{{asset($data->img)}}" class="" style="width: 120px" alt="">
                </div>
                <div class="mt-4">
                    <div class="d-flex flex-column align-items-center justify-content-between text-white">
                        <ul class="font-kecil component-details-list p-0 m-0">
                            <li>
                                <span>PART NO</span>
                                <span>{{$data->kode_komponen}}</span>
                            </li>
                            <li>
                                <span>PART ID</span>
                                <span>{{$data->id_mesin}}{{$data->kode_komponen}}</span>
                            </li>
                            <li>
                                <span>TYPE</span>
                                <span>
                                    {{(isset($data->types)) ? $data->types->nama : '-'}}
                                </span>
                            </li>
                            <li>
                                <span>Last Maintenance</span>
                                <span>{{ ($data->updated_at != null) ? date('D, d/m/Y',strtotime($data->updated_at)) : ''}}</span>
                            </li>
                            <li>
                                <span>Condition</span>
                                <span>{{$data->condition}}% <span style="color: {{$data->condition_parameter_color}}">({{$data->condition_parameter}})</span></span>
                            </li>
                            <li>
                                <span class="text-warning">Breakdown Posibility</span>
                                <span class="badge fw-bold {{($data->breakdown_possibility <= 50) ? 'bg-success':'bg-danger'}}" style="font-size: .8rem">{{$data->breakdown_possibility}}%</span>
                            </li>
                        </ul>
                    </div>        
                    <div class="mt-4 d-flex">
                        <button type="button" class="m-1 w-100 btn btn-sm btn-primary fw-bold">DOWNLOAD FORM</button>
                        @if ($data->breakdown_possibility > 50 || $data->condition < 50)
                            <button type="button" class="m-1 w-100 btn btn-sm btn-warning fw-bold" onclick="repairKomponen({{$data->id}})">MARK AS REPAIRED</button>
                        @else
                            <button type="button" class="m-1 w-100 btn btn-sm btn-secondary fw-bold disabled">MARK AS REPAIRED</button>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</div>