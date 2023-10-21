<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>{{$name_page}}</h4>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            @if(isset($links))
                @foreach($links as $link)
                    <li class="breadcrumb-item active"><a href="{{$link['url']}}">{{$link['name']}}</a></li>
                @endforeach
            @endif


        </ol>
    </div>
</div>
