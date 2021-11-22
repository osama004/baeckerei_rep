
@foreach($products as $product)
    <p>This is product {{$product -> name}}</p>
    <p>{{$product -> price}}</p>
    <p>{{$product -> image}}</p>

@endforeach
