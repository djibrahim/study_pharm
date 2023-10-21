@if ($message = Session::get('success'))

    <div class="alert alert-success alert-dismissible alert-alt solid fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        <strong>{{ $message }}!</strong>
    </div>

@endif


@if ($errors->any())

    <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        @foreach ($errors->all() as $error)
        <strong><li>{{ $error }} !</li></strong>
        @endforeach
    </div>
@endif

