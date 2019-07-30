<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.brand.add-brand');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBrand(Request $request)
    {
        //
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[a-zA-Z ]+$/u|max:20',
             'brand_description'=>'required',
             'publication_status'=>'required',

        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/brand/add')->with('message','Brand info saved successfully');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageBrand()
    {
        $brands = Brand::all();
        return view('admin.brand.manage-brand',['brands'=>$brands]);

    }

    public function unpublishedBrand($id){
        $brand = Brand::find($id);
        $brand -> publication_status = 0;
        $brand->save();

        return redirect('/brand/manage');
    }

    public function publishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();

        return redirect('/brand/manage');
    }

    public function editBrand($id)
    {
        //
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBrand(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect('/brand/manage')->with('message','Brand Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('/brand/manage');
    }
}
