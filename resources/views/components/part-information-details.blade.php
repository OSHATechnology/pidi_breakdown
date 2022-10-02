
@isset($Engine)
<div class="position-absolute " style="bottom:20px;left:20px;">
    <div class="p-2 rounded-1" style="background-color: dodgerblue; ">
        <button class="btn text-white" id="btnInfoDetails">INFORMATION DETAILS <i class="fa fa-info-circle"></i></button>
        <table class="table text-white table-borderless d-none" id="tblInformationDetails">
            <thead>
                <tr>
                    <th>No</th>
                    <th>PART NO</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $item) --}}
                <tr>
                    <td>1</td>
                    <td>123786712</td>
                    <td>
                        <span class="badge bg-danger">NG</span>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>129837289</td>
                    <td>
                        <span class="badge bg-success">OK</span>
                    </td>
                </tr>
            {{-- @endforeach --}}
        </table>
    </div>
</div>


@push('js-breakdown')
    <script>
        $('#btnInfoDetails').click(function(){
            $('#tblInformationDetails').toggleClass('d-none');
        })
    </script>
@endpush

@endisset