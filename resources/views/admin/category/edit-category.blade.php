@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <br>

            <div class="well">
                <h3 class="text-center text-success">Edit Category</h3>
                <hr>
                <h5 class="text-center text-primary">{{Session::get('message')}}</h5>
                <form action="{{route('update-category')}}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
                            <input type="hidden" name="id" class="form-control" value="{{$category->id}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Category Description</label>
                        <div class="col-md-9">
                            <textarea type="text" name="category_description" class="form-control" rows="5" cols="30">{{$category->category_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" {{$category->publication_status==1 ? 'checked' : ' '}} value="1" >Published</label>
                            <label><input type="radio" name="publication_status" {{$category->publication_status==0 ? 'checked' : ' '}} value="0" >Unublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" value="Update" class="btn btn-success btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

