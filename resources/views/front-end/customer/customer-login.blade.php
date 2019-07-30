@extends('front-end.master')

@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{route('/')}}">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <hr>

    <div class="content">
        <div class="container">
            <div class="row">
                <br>
                <div class="col-md-4 col-md-offset-4 well">
                    <h4 class="text-center text-primary">Register Here</h4>
                    <hr>
                    <form action="{{route('customer-sign-up')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email_address" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone_no" class="form-control" placeholder="Phone no.">
                        </div>
                        <div class="form-group">
                            <textarea type="number" name="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Register Now">
                        </div>
                    </form>
                </div>
{{--                <div class="col-md-5 col-md-offset-1 well">--}}
{{--                    <h4 class="text-center text-primary">Login</h4>--}}
{{--                    <hr>--}}
{{--                    <h3>{{Session::get('message')}}</h3>--}}
{{--                    <form action="" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="email" name="email_address" class="form-control" placeholder="Email">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" name="password" class="form-control" placeholder="Password">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="checkbox"> Remember Password--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Login">--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <a href="" class="pull-right">Forget Password?</a>--}}
{{--                </div>--}}
            </div>

        </div>

    </div>



@endsection
