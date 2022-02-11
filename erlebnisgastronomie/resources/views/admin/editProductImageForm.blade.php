@extends('layouts.admin')

@section('body')


<div class="table-responsive">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>

            <li>{!! print_r($errors->all()) !!}</li>

        </ul>
    </div>
    @endif



    <h3>Current Image</h3>
    <div><img loading="lazy"
              src="/images/{{$product->image}}"
              alt="" style="max-width: 300px; max-height: 300px;"></div>

    <form action="{{ route('adminUpdateProductImage',['product_id' => $product->product_id ])}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}



        <div class="form-group">
            <label for="description">Update Image</label>
            <input type="file" class=""  name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Speichern</button>
    </form>

</div>
@endsection
