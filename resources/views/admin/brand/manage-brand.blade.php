@extends('admin.master')

@section('body')
    <div class="panel">
        <div class="panel-body">
            <table class="table table-bordered">
                <tr>
                    <th>Sl No.</th>
                    <th>brand Name</th>
                    <th>brand Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_description}}</td>
                        <td>{{$brand->publication_status==1 ? 'Published' : 'Unpublished'}}</td>
                        <td>
                            @if($brand->publication_status==1)
                                <a href="{{route('unpublished-brand',['id'=>$brand->id])}}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-arrow-up"></span></a>
                            @else
                                <a href="{{route('published-brand',['id'=>$brand->id])}}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-arrow-down"></span></a>
                            @endif
                            <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-success">
                                <span class="glyphicon glyphicon-edit"></span></a>
                            <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>

    </div>







@endsection

