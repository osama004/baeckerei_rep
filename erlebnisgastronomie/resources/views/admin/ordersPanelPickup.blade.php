@extends('layouts.admin')

@section('body')


<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>



  <style>

                  /* The payment window */
                .payment-window {
                  display: none; /* Hidden by default */
                  position: fixed; /* Stay in place */
                  z-index: 1; /* Sit on top */
                  padding-top: 100px; /* Location of the box */
                  left: 0;
                  top: 0;
                  width: 100%; /* Full width */
                  height: 100%; /* Full height */
                  overflow: auto; /* Enable scroll if needed */
                  background-color: rgb(0,0,0); /* Fallback color */
                  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                }

                /* payment window content */
                .payment-window-content {
                  background-color: #fefefe;
                  margin: auto;
                  padding: 30px;
                  border: 1px solid #888;
                  width: 45%;
                }

                /*  payment window close button */
                .payment-window-close {
                  color: #aaaaaa;
                  float:right;
                  margin-left:20px;
                  font-size: 28px;
                  font-weight: bold;
                }


                .payment-window-close:hover,
                .payment-window-close:focus {
                  color: #aaaaaa;
                  text-decoration: none;
                  cursor: pointer;
                }



     </style>


<h1>Pickup Order Panel</h1>

@if(session('orderDeletionStatusOK'))
<div class="alert alert-success"> {{session('orderDeletionStatusOK')}} </div>
@endif
@if(session('orderDeletionStatusNotOk'))
<div class="alert alert-danger"> {{session('orderDeletionStatusNotOk')}} </div>
@endif




<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#order_id</th>
            <th>Date</th>
            <th>Delivery Date</th>
            <th>Price</th>
            <th>customer Name</th>
            <th>Status</th>
            <th>payment_info</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
        <tr>
            <td>{{$order->order_id}}</td>

            <td>{{$order->date_get}}</td>
            <td>{{$order->delivery_date}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->fullName}}</td>
            <td>{{$order->status}}</td>




  <td><a class="btn btn-primary"
  onclick="getPaymentInfo('{{$order->order_id}}','{{$order->status}}')"> Payment info </a></td>



            <td><a href="{{ route('AdminEditOrderForm',['order_id' => $order->order_id ])}}" class="btn btn-primary">Edit</a></td>

            <td><a href="{{ route('AdminDeleteOrder',['order_id' => $order->order_id ])}}"
                onclick="return confirm('Sind Sie sicher, dass Sie die Bestellung löschen wollen?')"
            class="btn btn-warning">Remove</a></td>


        </tr>

        @endforeach





        </tbody>
    </table>






        <!-- The payment window -->
        <div id="my-payment-window" class="payment-window">

          <!-- status content -->
          <div class="payment-window-content">
            <span class="payment-window-close">&times;</span>
            <h2>Payment Info</h2>
            <p>Loading..</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>

          </div>

        </div>




    {{$orders->links()}}

</div>




<script>



 function getPaymentInfo(order_id,status){


        if(status === 'paid'){

                  $.get( "http://localhost:8081/payment/getPaymentInfoByOrderId/"+order_id, function( data ) {

                        // alert( "Data Loaded: " + data );
                         var paymentInfo = JSON.parse(data);
                          $( ".payment-window" ).show();
                          $( ".payment-window-content p:eq(0)" ).text( "ID: " + paymentInfo.id);
                          $( ".payment-window-content p:eq(1)" ).text( "Payment ID: " + paymentInfo.paypal_payment_id);
                          $( ".payment-window-content p:eq(2)" ).text( "Payer ID: " + paymentInfo.paypal_payer_id);
                          $( ".payment-window-content p:eq(3)" ).text( "Amount: $" + paymentInfo.amount);
                          $( ".payment-window-content p:eq(4)" ).text( "Date: " + paymentInfo.date);

                          });



        } else if(status === 'on_hold'){


                $(".payment-window").show();
                $( ".payment-window-content p:eq(0)" ).text( "Not Paid Yet");
                $( ".payment-window-content p:eq(1)" ).text( "");
                $( ".payment-window-content p:eq(2)" ).text( "");
                $( ".payment-window-content p:eq(3)" ).text( "");
                $( ".payment-window-content p:eq(4)" ).text( "");


        }else{

               $( ".payment-window" ).show();
               $( ".payment-window-content p:eq(0)" ).text( "Undefined status");
                $( ".payment-window-content p:eq(1)" ).text( "");
                $( ".payment-window-content p:eq(2)" ).text( "");
                $( ".payment-window-content p:eq(3)" ).text( "");
                $( ".payment-window-content p:eq(4)" ).text( "");

        }

 }



        $(".payment-window-close").click(function(){
               $(".payment-window").hide();

        });






</script>





@endsection





