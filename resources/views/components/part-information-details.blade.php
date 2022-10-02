
@isset($Engine)
<div class="position-absolute " id="info-component-details" style="bottom:20px;left:20px;">
    <div class="p-2 rounded-1" style="background-color: dodgerblue; ">
        <button type="button" class="btn text-white w-100" id="btnInfoDetails">INFORMATION DETAILS <i class="fa fa-info-circle"></i></button>
        <div class="" id="divtblinfo">
            <table class="table text-white table-borderless d-block" style="height: 100px; overflow-y: scroll;" id="tblInformationDetails">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>PART NO</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-white" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        
    <button type="button" class="btn position-absolute text-white" style="top: 0; right: -20px; background-color: dodgerblue;" id="btnToggleDetails">
        <i class="fa fa-chevron-left"></i>
    </button>
</div>

<div class="position-absolute"  id="info-parameter-details" style="top:20px;right:-140px;">
    <div class="p-2 rounded-1" style="background-color: dodgerblue; ">
        <button type="button" class="btn text-white w-100" id="btnParameterDetails" >Parameter Info</button>
        <div class="d-none" id="divtblparam">
            <div class="p-1">
                <span class="text-white fw-bold">CONDITION</span>
                <table class="table text-white table-borderless d-block" >
                    <tbody>
                        <tr>
                            <td>0% - 25%</td>
                            <td>: <span class="text-danger">Critical</span></td>
                        </tr>
                        <tr>
                            <td>25% - 60%</td>
                            <td>: <span class="text-warning">Need Repair</span></td>
                        </tr>
                        <tr>
                            <td>60% - 85%</td>
                            <td>: <span class="text-success">Good</span></td>
                        </tr>
                        <tr>
                            <td>85% - 100%</td>
                            <td>: <span class="text-success">Very Good</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="">
                <span class="text-white fw-bold">BREAKDOWN POSIBILITY</span>
                <table class="table text-white table-borderless d-block" >
                    <tbody>
                        <tr>
                            <td>PART > 60%</td>
                            <td>: <span class="text-success">0</span></td>
                        </tr>
                        <tr>
                            <td>PART 50-60%</td>
                            <td>: <span class="text-success">10 – 20</span></td>
                        </tr>
                        <tr>
                            <td>PART 30 – 50</td>
                            <td>: <span class="text-warning">20 – 60</span></td>
                        </tr>
                        <tr>
                            <td>PART 30 – 20</td>
                            <td>: <span class="text-warning">60 – 80</span></td>
                        </tr>
                        <tr>
                            <td>PART < 20</td>
                            <td>: <span class="text-danger">80 - 99</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
    <button type="button" class="btn position-absolute text-white parameter-hidden" style="top: 0; left: -20px; background-color: dodgerblue;" id="btnToggleParamInfo">
        <i class="fa fa-chevron-left"></i>
    </button>
</div>


@push('js-breakdown')
    <script>
        $('#btnInfoDetails').click(function(){
            $('#divtblinfo').toggleClass('d-none');
        });
        $('#btnToggleDetails').click(function(){
            if($(this).hasClass('details-hidden')){
                $(this).removeClass('details-hidden');
                $(this).html('<i class="fa fa-chevron-left"></i>');
                $('#info-component-details').animate({
                    left: '20px'
                }, 500);
            }else{
                $(this).addClass('details-hidden');
                $('#divtblinfo').addClass('d-none');
                $(this).html('<i class="fa fa-chevron-right"></i>');
                $('#info-component-details').animate({
                    left: '-220px'
                }, 500);
            }
        });
        $('#btnParameterDetails').click(function(){
            $('#divtblparam').toggleClass('d-none');
        });
        $('#btnToggleParamInfo').click(function(){
            if($(this).hasClass('parameter-hidden')){
                $(this).removeClass('parameter-hidden');
                $(this).html('<i class="fa fa-chevron-right"></i>');
                $('#info-parameter-details').animate({
                    right: '20px'
                }, 500);
            }else{
                $(this).addClass('parameter-hidden');
                $('#divtblparam').addClass('d-none');
                $(this).html('<i class="fa fa-chevron-left"></i>');
                $('#info-parameter-details').animate({
                    right: '-140px'
                }, 500);
            }
        });
    </script>
@endpush

@endisset