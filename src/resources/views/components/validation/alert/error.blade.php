@php
    $error_msgs = \Session::get($error_type);
@endphp
@if (\Session::has($error_type))
    @foreach ($error_msgs as $error)
        <div class="panda-center">
            <div class="alert alert-danger panda-center " style="height: 12px">
                <span class="material-icons md-18">warning</span> <span>{{ $error }}</span>
            </div>
        </div>
    @endforeach
@endif
@if ($errors ?? false)
    @foreach ($errors as $error)
        <div class="panda-center">
            <div class="alert alert-danger panda-center " style="height: 12px">
                <span class="material-icons md-18">warning</span> <span>{{ $error }}</span>
            </div>
        </div>
    @endforeach
@endif