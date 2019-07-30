<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Payment;
use App\ProductDetail;
use App\Shipping;
use Cart;
use Session;
use Mail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    public function customerSignUp(Request $request){


        $this->validate($request,[
            'email_address'=>'email|unique:customers,email_address'
        ]);

        $customer=new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = bcrypt($request->password);
        $customer->phone_no = $request->phone_no;
        $customer->address = $request->address;
        $customer->save();

       $customerId = $customer->id;
       Session::put('customerId',$customerId);
       Session::put('customerName',$customer->first_name.' '.$customer->last_name);

       $data = $customer->toArray();
        Mail::send('front-end.mails.confirmation-mail',$data,function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Confirmation Mail');
        });

        return redirect('/checkout/shipping');
    }

    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email_address',$request->email_address)->first();
        if (password_verify($request->password,$customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);
            return redirect('/checkout/shipping');

        }
        else{
           return redirect('/checkout')->with('message','Invalid Password');
        }
    }

    public function forgetPassword(){
        return view('front-end.checkout.forget-password');
    }

    public function forgotPassword(Request $request){
        $data = $request->all();

        $customerCount = Customer::where('email_address',$data['email_address'])->count();
        if ($customerCount==0){
            return redirect('/customer/forget-password')->with('message','Email does not exist');}


            $customerDetails = Customer::where('email_address',$data['email_address'])->first();
            $randomPassword = str_random(8);
            $new_password = bcrypt($randomPassword);

            Customer::where('email_address',$data['email_address'])->update(['password'=>$new_password]);

            $email = $data['email_address'];
            $name = $customerDetails->first_name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$randomPassword

            ];
            Mail::send('front-end.mails.forget-password',$messageData,function ($message) use($email){
                $message->to($email)->subject('New Password- Kinun Sob team');
            });

    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function newcustomerLoginCheck(){
        return view('front-end.customer.customer-login');
    }

    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }

    public function saveShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_no = $request->phone_no;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

   public function paymentForm(){
       return view('front-end.checkout.payment-form');
   }

   public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        if ($paymentType=='cash'){
            $order = new Order();
            $order->customer_id=Session::get('customerId');
            $order->shipping_id=Session::get('shippingId');
            $order->order_total=Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id= $order->id;
            $payment->payment_type = $request->payment_type;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $productDetail = new ProductDetail();
                $productDetail->order_id = $order->id;
                $productDetail->product_id = $cartProduct->id;
                $productDetail->product_name = $cartProduct->name;
                $productDetail->product_price = $cartProduct->price;
                $productDetail->product_quantity = $cartProduct->qty;
                $productDetail->save();
            }
            Cart::destroy();
            return redirect('checkout/complete-order');

        }

        elseif ($paymentType=='paypal'){

        }

        elseif ($paymentType=='bkash'){

        }
   }

   public function completeOrder(){
        return view('front-end.checkout.order-final');
   }
}
