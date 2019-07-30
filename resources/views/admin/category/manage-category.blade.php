@extends('admin.master')

@section('body')
 <div class="panel">
     <div class="panel-body">
         <table class="table table-bordered">
             <tr>
                 <th>Sl No.</th>
                 <th>Category Name</th>
                 <th>Category Description</th>
                 <th>Publication Status</th>
                 <th>Action</th>
             </tr>
             @php($i=1)
             @foreach($categories as $category)
             <tr>
                 <td>{{$i++}}</td>
                 <td>{{$category->category_name}}</td>
                 <td>{{$category->category_description}}</td>
                 <td>{{$category->publication_status==1 ? 'Published' : 'Unpublished'}}</td>
                 <td>
                     @if($category->publication_status==1)
                         <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info">
                             <span class="glyphicon glyphicon-arrow-up"></span></a>
                     @else
                         <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning">
                             <span class="glyphicon glyphicon-arrow-down"></span></a>
                     @endif
                     <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success">
                     <span class="glyphicon glyphicon-edit"></span></a>
                     <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-danger">
                     <span class="glyphicon glyphicon-trash"></span></a>
                 </td>
             </tr>
             @endforeach
         </table>
     </div>
 </div>
@endsection
