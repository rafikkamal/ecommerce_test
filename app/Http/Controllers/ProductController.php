<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller {

    /**
     * Create a new authentication controller instance.
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::with('Category')->orderBy('id', 'ASC')->paginate(20);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //for generating dropdown
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->title;
        }
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->validate($request, $this->rules);
        $product = new Product;
        $product_picture = new \App\ProductPicture;

        $product->title = $request['title'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->category_id = $request['category'];
        $image = $request->file('picture');
        if ($image) {
            $image_name = $image->getClientOriginalName();
            $image->move('assets/img', $image_name);
        } else {
            $image_name = 'no_image.png';
        }
        $product_picture->title = $image_name;
        $product_picture->save();
        $product->picture_id = $product_picture->id;
        $product->save();
        Session::flash('success', 'The product has been successfully added');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $product = Product::find($id);
        if ($product) {
            return view('products.show')->with(['product' => $product]);
        }
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::find($id);
        $categories = [];
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->title;
        }
        return view('products.edit', compact('categories'))->with(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //$this->validate($request, $this->rules);
        $product = Product::find($id);
        $product->title = $request['title'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->category_id = $request['category'];
        $product->save();
        Session::flash('success', 'The product was successfully updated.');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        Session::flash('success', 'The product was successfully deleted.');
        return redirect()->route('products.index');
    }

    /**
     * Update Product Picture 
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function updatePicture(Request $request, $productId) {
        $product = Product::find($productId);
        $picture = $product->picture->title;
        $image = $request->file('picture');
        if ($image) {
            if ($picture !== 'no_image.png') {
                $image->move('assets/img/', $picture);
            } else {
                $image_name = $image->getClientOriginalName();
                $image->move('assets/img/', $image_name);
                $product_picture = \App\ProductPicture::find($product->picture_id);
                $product_picture->title = $image_name;
                $product_picture->save();
            }
            Session::flash('success', 'The product picture was successfully updated.');
            return redirect()->route('products.index');
        }
        else{
            return redirect()->route('products.edit',['product_id' => $productId]);
        }
    }

}
