<?php

namespace App\Http\Controllers\Payment;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentsController extends Controller
{
    public function showPaymentPage()
    {
        $payment_info = Session::get('payment_info');
        if ($payment_info) {
            if ($payment_info['status'] == 'on_hold') {
                return view('payment.paymentpage', ['payment_info' => $payment_info]);
            }
            else { // user has already payed
                return redirect()->route("kaffee&products")->with('alreadyPayed', 'Sie haben bereit bezahlt !! Sie können weiter
                                einkaufen');
            }
        }
        else { // access payment without
            return redirect()->route("shoppingcart")->with('checkCart', 'Bitte Kontrollieren Sie ,dass Ihre Producte in
            der Warenkorp haben um die zu bezahlen');
        }

    }
    /*public function showPaymentPage()
    {
        $cart = Session::get('cart');
        $payment_info = Session::get('payment_info');
        if (!$cart) {
            $cart = new Cart($cart);
        }
        if ($cart->totalQuantity == 0) {
            return redirect()->route("shoppingcart")->with('emptyCart', 'Ihr Warenkorb ist leer!!');
        } else {
            if ($payment_info['status'] == 'on_hold') {
                return view('payment.paymentpage', ['payment_info' => $payment_info]);
            }
            else { // user has already payed

            }

        }

    }*/
}
