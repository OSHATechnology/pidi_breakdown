
<div class="d-flex position-absolute" style="top:32px;left:32px;">
    <div id="sideNavBreakdown" class="bg-white rounded-1">
        <a href="/">
            <img src="{{asset('assets/img/toyota-logo.png')}}" alt="">
        </a>
        <ul class="list-group" id="sideNavBreakdownItem">
            <a class="list-group-item border-0 rounded list-group-item-action" href="/"><i class="fa fa-home"></i></a>
            <a class="list-group-item border-0 rounded list-group-item-action " href="/breakdown"><img style="width: inherit" src="{{asset('assets/img/icons/engine-icon.svg')}}" alt=""></a>
        </ul>
    </div>
    
    @isset($Engine)
    <div>
        <h1 class="text-white">Detail Component {{$Engine->nama}}</h1>
        <h6 style="color:#CCCCCC;">This all partition from  {{$Engine->nama}}</h6>
    </div>
    @endisset
</div>