

    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('ftco-32x32.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link href="{{asset('/css/all.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">


    <link rel="stylesheet" href="{{asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>


<div class="slider-wrap">
    <div class="slider-item" style="background-image: url('/storage/images/new_filler_1.jpg');">
        <div class="container">
            <div class ="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>


            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p> Lieferung/Rechnung an:</p>
                            <div class="form-one">
                                           <div class="total_area">
                                                    <ul>

                                                        <li>Payment Status:
                                                        @if($payment_info['status'] == 'on_hold')

                                                         <span>noch nicht bezahlt</span>

                                                        @endif

                                                        </li>
                                                        <li>Liefergebühr: <span>0€</span></li>
                                                        <li>Gesamtkosten: <span>{{$payment_info['price']}}€</span></li>
                                                    </ul>
                                                    <a class="btn btn-default update" href="">Update</a>
                                                    <a class="btn btn-default check_out" id="paypal-button" ></a>
                                                </div>

                            </div>
                            <div class="form-two">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>

</section> <!--/#payment-->
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'YOUR_SANDBOX_CLIENT_ID',
      production: 'YOUR_PRODUCTION_CLIENT_ID'
    },
    // Customize button (optional)
    locale: 'de_AT',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: "{{$payment_info['price']}}",
            currency: 'EUR'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');

        window.location = './paymentreceipt/'+data.paymentID+'/'+data.payerID;

      });
    }
  }, '#paypal-button');

</script>

<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg></div>

<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>

<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/magnific-popup-options.js')}}"></script>

<script src="{{asset('js/adminpanel.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>


</body>
</html>

