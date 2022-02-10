@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    <form action="{{ route('adminUpdateProduct',['product_id' => $product->product_id ])}}" method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="name">title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Product Name" value="{{$product->title}}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{$product->description}}" required>
        </div>



        <div class="form-group">
            <label for="type">Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{$product->price}}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>

@endsection
