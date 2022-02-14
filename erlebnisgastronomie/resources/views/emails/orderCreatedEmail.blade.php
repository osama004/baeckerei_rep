<h1>Order Created</h1>
<div>
    Price: {{ $cart->totalPrice  }}
</div>
<div>
    items:<br>
    @foreach($cart ->items as $item)
        <td class="cart_description">
            <h4><a href="">{{$item['data']['title']}}</a>
                <a class="cart_quantity_delete" href="{{ route('DeleteItemFromCart',['product_id' => $item['data']['product_id']]) }}"><i class="fa fa-times"></i></a>
            </h4>
            <p>{{$item['data']['description']}} </p>
        </td>
        <td class="cart_price">
            <p>{{$item['data']['price']}}€</p>
        </td>
    @endforeach
</div>
