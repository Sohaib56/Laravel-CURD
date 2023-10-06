<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index(){
    //     return  view('product.index',['products'=>Product::get()]);
    // }

public function index()
{
    $userProducts = Product::where('user_id', auth()->id())->get();
    return view('product.index', ['products' => $userProducts]);
}

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        //Validation

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        //upload image
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product=new Product;
        $product->user_id = auth()->id();
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();
        return redirect()->route('products.index')->withSuccess('Product Created !!!');

    }

    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view('product.edit',['product'=>$product]);
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $product=Product::where('id',$id)->first();
        if(isset($request->image)){

            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image=$imageName;
        }
        //upload image
        $product->name=$request->name;
        $product->description=$request->description;
        $product->save();
        return redirect()->route('products.index')->withSuccess('Product Updated !!!');

    }

    public function delete($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back();
    }

    public function show($id){
        $product=Product::where('id',$id)->first();
        return view('product.show',['product'=>$product]);
    }
}
