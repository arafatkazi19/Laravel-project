@extends('front-end.master')

@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{route('/')}}">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <h3>{{Session::get('customerName')}} you have to enter your payment option</h3>
                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <h4 class="text-center text-primary">Payment Info</h4>
                    <hr>
                    <form action="{{route('new-order')}}" method="POST">
                        @csrf
                       <table class="table table-bordered">
                           <tr>
                               <th>Cash On Delivery</th>
                               <td><input type="radio" name="payment_type" value="cash">Cash On Delivery</td>
                           </tr>
                           <tr>
                               <th>Paypal</th>
                               <td><input type="radio" name="payment_type" value="paypal">Paypal</td>
                           </tr>
                           <tr>
                               <th>Bkash</th>
                               <td><input type="radio" name="payment_type" value="bkash">Bkash</td>
                           </tr>
                           <tr>
                               <td></td>
                               <td><input type="submit" class="btn btn-success" name="btn"value="Confirm Order"></td>
                           </tr>
                       </table>
                    </form>
                </div>

            </div>

        </div>

    </div>



@endsection
