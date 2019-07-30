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
                    <h3>{{Session::get('customerName')}} you have to enter your shipping info for proceeding.
                   If the information is same then just click save shopping info </h3>
                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-6">
                    <h4 class="text-center text-primary">Shipping Info</h4>
                    <hr>
                    <form action="{{route('new-shipping')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}" class="form-control" placeholder="Full Name">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email_address" value="{{$customer->email_address}}" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone_no" value="{{$customer->phone_no}}" class="form-control" placeholder="Phone Number">
                        </div>

                        <div class="form-group">
                            <textarea type="text" name="address" class="form-control" placeholder="Address">{{$customer->address}}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Save Shipping Info">
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>



@endsection
