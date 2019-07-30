@extends('admin.master')

@section('body')
    <div class="panel">
        <div class="panel-body">
            <h3 class="text-center text-primary">Order Info</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Order No</th>
                    <th>{{$order->id}}</th>

                </tr>
                <tr>
                    <th>Order Total</th>
                    <th>{{$order->order_total}}</th>

                </tr>
                <tr>
                    <th>Ordr Status</th>
                    <th>{{$order->order_status}}</th>

                </tr>
                <tr>
                    <th>Order Date</th>
                    <th>{{$order->created_at}}</th>

                </tr>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="text-center text-primary">Customer Info</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Customer Name</th>
                    <th>{{$customer->first_name.' '.$customer->last_name}}</th>

                </tr>
                <tr>
                    <th>Customer Phone No.</th>
                    <th>{{$customer->phone_no}}</th>

                </tr>
                <tr>
                    <th>Customer Email</th>
                    <th>{{$customer->email_address}}</th>

                </tr>
                <tr>
                    <th>Customer Address</th>
                    <th>{{$customer->address}}</th>

                </tr>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="text-center text-primary">Shipping Info</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Full Name</th>
                    <th>{{$shipping->full_name}}</th>

                </tr>
                <tr>
                    <th>Phone No.</th>
                    <th>{{$shipping->phone_no}}</th>

                </tr>
                <tr>
                    <th>Email Address</th>
                    <th>{{$shipping->email_address}}</th>

                </tr>
                <tr>
                    <th>Address</th>
                    <th>{{$shipping->address}}</th>

                </tr>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="text-center text-primary">Payment Info</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Payment Type</th>
                    <th>{{$payment->payment_type}}</th>

                </tr>
                <tr>
                    <th>Payment Status</th>
                    <th>{{$payment->payment_status}}</th>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <h3 class="text-center text-primary">Product Info</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Sl. No</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                </tr>
                @php($i=1)
                @foreach($productDetails as $productDetail)
                <tr>
                    <th>{{$i++}}</th>
                    <th>{{$productDetail->id}}</th>
                    <th>{{$productDetail->product_name}}</th>
                    <th>{{$productDetail->product_price}}</th>
                    <th>{{$productDetail->product_quantity}}</th>
                    <th>{{$productDetail->product_price*$productDetail->product_quantity}}</th>

                </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection


