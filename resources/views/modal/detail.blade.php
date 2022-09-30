<div class="modal fade" id="modalMachine{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modalMachineLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-bc">
            <div class="modal-header text-white">
                <h5 class="modal-title" id="exampleModalLabel">Componen Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-bc">
                <ul class="list-group">
                    <li class="list-group-item modal-bc text-white d-flex justify-content-center align-items-center">
                        <img src="{{asset('assets')}}/images/cylinder.png" style="height: auto; width: 60%;">
                    </li>
                    <input type="hidden" value="{{$item->id}}" id="id_data">
                    <li class="list-group-item modal-bc text-white d-flex justify-content-between align-items-center">Machine ID
                        <span class="">{{$item->id_mesin}}</span>
                    </li>
                    <li class="list-group-item modal-bc text-white d-flex justify-content-between align-items-center">Type
                        <span class="">{{$item->type}}</span>
                    </li>
                    <li class="list-group-item modal-bc text-white d-flex justify-content-between align-items-center">Latest Maintenance
                        <span class="">{{$item->latest_maintenance}}</span>
                    </li>
                    <li class="list-group-item modal-bc text-white d-flex justify-content-between align-items-center">Condition
                        <span class="">{{$item->condition}}</span>
                    </li>
                    <li class="list-group-item modal-bc text-warning d-flex justify-content-between align-items-center">Breakdown Possibility
                        <span class="badge {{($item->breakdown_possibility > 70) ? 'badge-success' : 'badge-danger'}} badge-pill">{{$item->breakdown_possibility}}%</span>
                    </li>
                    <li class="list-group-item modal-bc text-warning d-flex justify-content-between align-items-center">Next Maintenance
                        <span class="text-warning">{{$item->next_maintenance}}</span>
                    </li>
                </ul>
            </div>
            @if($item->breakdown_possibility < 70)
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-warning black repair-now" id="repair-now" data-id="{{$item->id}}">Repair now!</a>
            </div>
            @endif
        </div>
    </div>
</div>