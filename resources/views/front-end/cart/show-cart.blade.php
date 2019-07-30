@extends('front-end.master')

@section('body')
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h3 class="text-center text-success">Shopping Cart</h3>

            <hr>
            <table class="table table-bordered">
                <tr>
                    <td>Sl. No</td>
                    <td>Product Name</td>
                    <td>Product Image</td>
                    <td>Product Price</td>
                    <td>Product Quantity</td>
                    <td>Total</td>

                    <td>Action</td>

                </tr>
                @php($i=1)
                @php($sum=0)
                @foreach($cartProducts as $cartProduct)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$cartProduct->name}}</td>
                    <td>
                        <img src="{{asset($cartProduct->options->image)}}" width="60">
                    </td>
                    <td>Tk. {{$cartProduct->price}}</td>
                    <td>
                        <form action="{{route('update-cart')}}" method="POST">
                            @csrf
                           <input type="number" name="qty" value="{{$cartProduct->qty}}" min="1">
                            <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">

                            <input type="submit" name="btn" class="btn btn-outline-warning" value="Update">

                        </form>
                    </td>
                    <td>Tk. {{$total = $cartProduct->qty*$cartProduct->price}}</td>

                    <td>
                        <a href="{{route('delete-cart-item',['rowId'=>$cartProduct->rowId])}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                    @php($sum = $sum+$total)
                @endforeach
            </table>
            <hr>
            <table class="table table-hover table-striped">
                <tr>
                    <th>Item Total</th>
                    <td>Tk. {{$sum}}</td>
                </tr>
                <tr>
                    <th>Vat Total</th>
                    <td>Tk. {{$vat=0}}</td>
                </tr>
                <tr>
                    <th>Grand Total</th>
                    <td>Tk. {{$orderTotal = $sum+$vat}}</td>
                    <?php
                       Session()->put('orderTotal',$orderTotal);
                       ?>
                </tr>
            </table>
            <div>
                @if(Session::get('customerId') && Session::get('shippingId'))
                <a href="{{route('checkout-payment')}}" class="btn btn-success pull-right">Checkout</a>
                @elseif(Session::get('customerId'))
                <a href="{{route('checkout-shipping')}}" class="btn btn-primary pull-right">Checkout</a>
                @else
                    <a href="{{route('checkout')}}" class="btn btn-primary pull-right">Checkout</a>
                @endif
                <a href="{{route('/')}}" class="btn btn-primary">Continue Shopping</a>

            </div>
        </div>
    </div>



@endsection
