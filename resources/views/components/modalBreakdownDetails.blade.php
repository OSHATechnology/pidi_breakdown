    <div class="component-details-popup">
        <div class="popup-backdrop" style="position:absolute;">
            <div class="bg-dark rounded p-4">
                @if ($data->breakdown_possibility <= 50)
                <div class="text-center mb-4">
                    <span style="color: #dddddd">Need Action to repair</span>
                </div>
                @endif

                <div class="d-flex align-items-center justify-content-center mb-2">
                                        <img src="{{asset($data->img)}}" class="" style="width: 120px" alt="">
                                    </div>
                <div class="d-flex mt-3 align-items-center justify-content-center mb-2">
                                        <h6 class="text-white" style="">{{$data->nama}}</h6>
                                    </div>
                <div class="mt-4">
                    <div class="d-flex flex-column align-items-center justify-content-between text-white">
                        <ul class="font-kecil component-details-list p-0 m-0">
                            <li>
                                <span>Name Component</span>
                                <span>{{$data->nama}}</span>
                            </li>
                            <li>
                                <span>Type</span>
                                <span></span>
                            </li>
                            <li>
                                <span>Last Maintenance</span>
                                <span>{{ ($data->updated_at != null) ? date('D, d m Y',strtotime($data->updated_at)) : ''}}</span>
                            </li>
                            <li>
                                <span>Condition</span>
                                <span>{{($data->breakdown_possibility > 50) ? 'Good':'Bad'}}</span>
                            </li>
                            <li>
                                <span class="text-warning">Breakdown Posibility</span>
                                <span class="badge {{($data->breakdown_possibility > 50) ? 'bg-success':'bg-danger'}}">{{$data->breakdown_possibility}}%</span>
                            </li>
                        </ul>
                    </div>        
                    @if ($data->breakdown_possibility <= 50)
                        <div class="mt-4">
                            <button class="w-100 btn btn-warning" style="font-weight: bold" onclick="repairKomponen({{$data->id}})">Repair Now!</button>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</div>