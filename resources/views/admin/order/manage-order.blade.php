@extends('admin.master')

@section('body')
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl No.</th>
                    <th>Category Name</th>
                    <th>Order Total</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($orders as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->first_name.' '.$order->last_name}}</td>
                        <td>Tk. {{$order->order_total}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>
                            <a href="{{route('view-order-details',['id'=>$order->id])}}" class="btn btn-info" title="View Order Details">
                            <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                            <a href="{{route('view-order-invoice',['id'=>$order->id])}}" class="btn btn-primary" title="View Order Invoice">
                            <span class="glyphicon glyphicon-zoom-out"></span>
                            </a>
                            <a href="{{route('download-order-invoice',['id'=>$order->id])}}" class="btn btn-success" title="Download Order Invoice">
                            <span class="glyphicon glyphicon-download"></span>
                            </a>
                            <a href="{{route('delete-order',['id'=>$order->id])}}" class="btn btn-danger" title="Delete Order">
                            <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection


