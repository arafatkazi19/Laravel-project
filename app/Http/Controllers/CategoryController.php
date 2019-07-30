<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        //Category::create($request->all());
        return redirect('/category/add-category')->with('message','Category Info Saved Successfully');

    }

    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',(['categories'=>$categories]));
    }

    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage-category');
    }

    public function publishedCategory($id){
        $categories=Category::find($id);
        $categories->publication_status = 1;
        $categories->save();

        return redirect('/category/manage-category');

    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);
    }

    public function updateCategory(Request $request){
       $category = Category::find($request->id);
       $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect('/category/manage-category')->with('message','Category info Updated Successfully');
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/category/manage-category');
    }

}
