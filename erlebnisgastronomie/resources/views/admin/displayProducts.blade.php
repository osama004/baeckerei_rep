@extends('layouts.admin')

@section('body')
    <h1 class="page-header">Dashboard</h1>
    <div class="search-form pull-left">
        <form action="{{route('SearchProducts')}}" method="GET" >
            <input type="text" name="searchText" placeholder="Search"/>
        </form>
    </div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Wochenkarte</th>
            <th>Price</th>
            <th>Edit Image</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
        <tr>
            <td>{{$product['product_id']}}</td>
            <td><img loading="lazy"
                     src="{{Storage::disk('local')->url('images/'.$product->image)}}"
                     alt="" style="max-width: 75px; max-height: 75px;"></td>

            <td>{{$product['title']}}</td>
            <td>{{$product['description']}}</td>
            @if ($product -> is_weekly_menu == true)
                <td> <span style="font-size: 150%;">&#10004;</span> </td>
            @else
                <td> <span style="font-size: 150%">X</span></td>
            @endif
            <td>€{{number_format($product['price'], 2, ',')}}</td>
            <td><a href="{{ route('adminEditProductImageForm',['product_id' => $product['product_id'] ])}}" class="btn btn-primary">Edit Image</a></td>
            <td><a href="{{ route('adminEditProductForm',['product_id' => $product['product_id'] ])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('adminDeleteProduct',['product_id' => $product['product_id']])}}"
                   onclick="return confirm('Sind Sie sicher, dass Sie das Produkt löschen wollen?')"
                   class="btn btn-warning">Remove</a></td>

        </tr>

        @endforeach

        </tbody>
    </table>
    {{$products->links()}}
</div>
@endsection
