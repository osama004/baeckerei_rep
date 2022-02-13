<h1>Order Created</h1>
<div>
    Price: {{ $cart->totalPrice }}
</div>
<div>
    items:<br>
    @foreach($cart -> $items as $item)
    <i>{{$item}}</i>
    @endforeach
</div>
