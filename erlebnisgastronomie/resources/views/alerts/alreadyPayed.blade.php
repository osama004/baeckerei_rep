@if(session('alreadyPayed'))
    <div class="alert alert-success"->{{session('alreadyPayed')}}</div>
@endif
