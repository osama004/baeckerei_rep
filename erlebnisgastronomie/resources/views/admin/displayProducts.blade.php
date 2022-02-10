@extends('layouts.admin')

@section('body')

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
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
            <td><img src="{{asset ('storage')}}/product_images/{{$product['image']}}" loading="lazy" alt="{{asset ('storage')}}/product_images/{{$product['image']}}" width="100" height="100" style="max-height:220px" ></td>

            <td>{{$product['title']}}</td>
            <td>{{$product['description']}}</td>
            <td>${{$product['price']}}</td>

            <td><a href="{{ route('adminEditProductImageForm',['product_id' => $product['product_id'] ])}}" class="btn btn-primary">Edit Image</a></td>
            <td><a href="{{ route('adminEditProductForm',['product_id' => $product['product_id'] ])}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ route('adminDeleteProduct',['product_id' => $product['product_id']])}}"  class="btn btn-warning">Remove</a></td>

        </tr>

        @endforeach

        </tbody>
    </table>
    {{$products->links()}}
</div>
@endsection
