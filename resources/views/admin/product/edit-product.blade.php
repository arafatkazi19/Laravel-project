
@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <br>
            <h5 class="text-center text-primary">{{Session::get('message')}}</h5>
            <div class="well">
                <h3 class="text-center text-success">Edit Product</h3>
                <hr>
                {{Form::open(['route'=>'update-product','method'=>'POST','class'=>'form-horizontal' , 'enctype'=>'multipart/form-data' , 'name'=>'editForm'])}}
                <div class="form-group">
                    <label class="control-label col-md-3">Category Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category_id">
                            <option>-----Select Category-----</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger font-weight-bold">{{$errors->has('category_id') ? $errors->first('category_id') : ' '}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Brand Name</label>
                    <div class="col-md-9">
                        <select class="form-control" name="brand_id">
                            <option>-----Select Brand-----</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger font-weight-bold">{{$errors->has('brand_id') ? $errors->first('brand_id') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Product Name</label>
                    <div class="col-md-9">
                        <input name="product_name" class="form-control" value="{{$products->product_name}}">
                        <input type="hidden" name="id" class="form-control" value="{{$products->id}}">
                        <span class="text-danger font-weight-bold">{{$errors->has('product_name') ? $errors->first('product_name') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Product Price</label>
                    <div class="col-md-9">
                        <input name="product_price" class="form-control" value="{{$products->product_price}}">
                        <span class="text-danger font-weight-bold">{{$errors->has('product_price') ? $errors->first('product_price') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Product Quantity</label>
                    <div class="col-md-9">
                        <input name="product_quantity" class="form-control" value="{{$products->product_quantity}}">
                        <span class="text-danger font-weight-bold">{{$errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Short Description</label>
                    <div class="col-md-9">
                        <textarea name="short_description" class="form-control" rows="5" cols="20">{{$products->short_description}}</textarea>
                        <span class="text-danger font-weight-bold">{{$errors->has('short_description') ? $errors->first('short_description') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Long Description</label>
                    <div class="col-md-9">
                        <textarea id="editor" name="long_description" class="form-control" rows="5" cols="30">{{$products->long_description}}</textarea>
                        <span class="text-danger font-weight-bold">{{$errors->has('long_description') ? $errors->first('long_description') : ' '}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Product Image</label>
                    <div class="col-md-9">
                        <input type="file" name="product_image" class="form-control" accept="iamge/*">
                        <img src="{{asset($products->product_image)}}" height="200">
{{--                        <span class="text-danger font-weight-bold">{{$errors->has('product_image') ? $errors->first('product_image') : ' '}}</span>--}}
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-3">Publication Status</label>
                    <div class="col-md-9 radio">
                        <label><input type="radio" name="publication_status" {{$products->publication_status==1 ? 'checked' : ' '}} value="1" >Published</label>
                        <label><input type="radio" name="publication_status" {{$products->publication_status==0 ? 'checked' : ' '}} value="0" >Unpublished</label><br>
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
<script>
    document.forms['editForm'].elements['category_id'].value = '{{$products->category_id}}';
    document.forms['editForm'].elements['brand_id'].value = '{{$products->brand_id}}';
</script>

@endsection
