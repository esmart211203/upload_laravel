<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Product_images;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('welcome',compact('products'));
    }
    public function store(Request $request){
        $data = $request->all();
        $title = $data['title'];
        $description = $data['description'];
        $product = new Product(['title' => $title, 'description' => $description]);
        $product->save();
        //images
        if($request->has('images')){
            foreach ($request->file('images') as $value) {
                $image = $title . '-image-' .time().rand(1,1000).'.'.$value->extension();
                $value->move(public_path('product_images'), $image);
                Product_images::create([
                    'product_id' => $product->id,
                    'image' => $image
                ]);
            }
        }
        return Redirect::route('index')->withSuccess('Product created successfully');
    }
    public function detail($id){
        $product = Product::find($id);
        $pro_images = Product_images::where('product_id', $product->id)->get();
        return view('detail',compact('product','pro_images'));
    }
}
