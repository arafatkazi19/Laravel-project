<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;


class NewShopController extends Controller
{
    //
    public function index(){

        $newProducts = Product::where('publication_status',1)
            ->orderBy('id','DESC')
            ->take(4)
            ->get();
        return view('front-end.home.home',[
        'newProducts'=>$newProducts]);
    }

    public function newProductsDetail(){
        $newProducts = Product::where('publication_status',1);
        $newProductsHome = Product::where('publication_status',1)
            ->orderBy('id','ASC')
            ->take(4)
            ->get();
        return view('front-end.home.new-products',[
            'newProductsHome'=>$newProductsHome,
            'newProducts'=>$newProducts
        ]);
    }


    public function categoryProduct($id){
        $categoryProducts = Product::where('category_id',$id)->where('publication_status',1)->get();

        return view('front-end.category.category-content',
            ['categoryProducts'=>$categoryProducts
            ]);
    }


    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.product.product-details',
            [
                'product'=>$product
            ]);
    }

    public function categoryProductDetail($id){
        $catPros = Product::find($id);
        return view('front-end.category.catProDetail',[
            'catPros'=>$catPros,
        ]);
    }



}
