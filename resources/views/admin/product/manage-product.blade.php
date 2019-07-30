@extends('admin.master')

@section('body')
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl No.</th>
                    <th>Category Name</th>
                    <th>Brand Name</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Image</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($products as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->brand_name}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>Tk. {{$product->product_price}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td>
                        <img src="{{asset($product->product_image)}}" height="200" weidth="200">
                    </td>
                    <td>{{$product->publication_status==1 ? 'Published' : 'Unpublished'}}</td>
                    <td>
                        @if($product->publication_status==1)
                            <a href="{{route('unpublished-product',['id'=>$product->id])}}" class="btn btn-info">
                                <span class="glyphicon glyphicon-arrow-up"></span></a>
                        @else
                            <a href="{{route('published-product',['id'=>$product->id])}}" class="btn btn-warning">
                                <span class="glyphicon glyphicon-arrow-down"></span></a>
                        @endif
                        <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success">
                            <span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{route('delete-product',['id'=>$product->id])}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                  @endforeach
            </table>
        </div>
    </div>
@endsection

