<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return  view('product.index');
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        //upload image
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product=new Product;
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();
        return back();

    }
}
