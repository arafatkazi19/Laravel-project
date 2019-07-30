
@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <br>
            <h5 class="text-center text-primary">{{Session::get('message')}}</h5>
            <div class="well">
                <h3 class="text-center text-success">Add Brand</h3>
                <hr>
                {{Form::open(['route'=>'new-brand','method'=>'POST','class'=>'form-horizontal'])}}
                <div class="form-group">
                    <label class="control-label col-md-3">Brand Name</label>
                    <div class="col-md-9">
                        <input type="text" name="brand_name" class="form-control">
                        <span class="text-danger font-weight-bold">{{$errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Brand Description</label>
                    <div class="col-md-9">
                        <textarea type="text" name="brand_description" class="form-control" rows="5" cols="30"></textarea>
                        <span class="text-danger font-weight-bold">{{$errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Publication Status</label>
                    <div class="col-md-9 radio">
                        <label><input type="radio" name="publication_status" value="1" >Published</label>
                        <label><input type="radio" name="publication_status" value="0" >Unpublished</label><br>
                        <span class="text-danger font-weight-bold">{{$errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block">
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>


@endsection
