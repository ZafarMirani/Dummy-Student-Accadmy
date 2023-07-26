<?php
    
namespace App\Http\Controllers;

// use App\Models\stripe;

use App\Models\StripeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use Stripe\Stripe as StripeStripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('Payments.stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)

    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      
    
      Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com.",
        ]);

       
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}