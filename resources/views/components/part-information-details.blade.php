
@isset($Engine)
<div class="position-absolute " id="info-component-details" style="bottom:20px;left:20px;">
    <div class="p-2 rounded-1" style="background-color: dodgerblue; ">
        <button class="btn text-white" id="btnInfoDetails">INFORMATION DETAILS <i class="fa fa-info-circle"></i></button>
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
        
    <button class="btn position-absolute text-white" style="top: 0; right: -20px; z-index:1; background-color: dodgerblue;" id="btnToggleDetails">
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
                $(this).html('<i class="fa fa-chevron-right"></i>');
                $('#info-component-details').animate({
                    left: '-220px'
                }, 500);
            }
        });
    </script>
@endpush

@endisset