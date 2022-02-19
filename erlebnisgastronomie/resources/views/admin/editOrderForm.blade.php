
@extends('layouts.admin')

@section('body')


<div class="table-responsive">
    <form action="{{route('AdminUpdateOrder',['order_id' => $order->order_id ])}} " method="post">

        {{csrf_field()}}

        <div class="form-group">
            <label for="date">get order date</label>
            <input type="date" class="form-control" name="date" id="date_get" placeholder="Date" value="{{$order->date_get}}" required>
        </div>
        <div class="form-group">
            <label for="del_date">Delivery Date</label>
            <input type="date" class="form-control" name="delivery_date" id="del_date" placeholder="delivery date" value="{{$order->delivery_date}}" required>
        </div>


        <div class="form-group">
            <label for="price">Price</label>
            <input type=number step="0.01" class="form-control" name="price" id="price" placeholder="price" value="{{$order->price}}" required>
        </div>

        <div class="form-group">
            <label for="fullName">Customer name</label>
            <input type=text class="form-control" name="fullName" id="fullName" placeholder="Customer name..." value="{{$order->fullName}}" required>
        </div>


        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" id="status" placeholder="status" value="{{$order->status}}" required>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>

</div>
@endsection
