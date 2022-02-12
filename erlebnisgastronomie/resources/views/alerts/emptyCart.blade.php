@if(session('emptyCart'))
    <div class="alert alert-warning"->{{session('emptyCart')}}</div>
@endif
