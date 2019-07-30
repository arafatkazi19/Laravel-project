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

                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">


                <div class="col-md-4 col-md-offset-4 well">
                    <h4 class="text-center text-primary">Forget Password</h4>
                    <hr>
                    <h3>{{Session::get('message')}}</h3>
                    <form action="{{route('forgot-password')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email_address" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btn" class="btn btn-primary btn-block" value="Login">
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>



@endsection
