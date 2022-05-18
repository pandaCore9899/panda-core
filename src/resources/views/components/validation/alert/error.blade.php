@if (\Session::has($error_type))
    @php
        $error_msgs = \Session::get($error_type);
    @endphp
     @foreach ($error_msgs as $error)
     <div class="panda-center">
        <div class="alert alert-danger panda-center " style="height: 12px">
            <span class="material-icons">warning</span> <span>{{$error}}</span>
         </div>
     </div>
    
    @endforeach
@endif
