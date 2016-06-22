<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {

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
        $categories = Category::orderBy('id', 'ASC')->paginate(20);
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->validate($request, $this->rules);
        $category = new category;

        $category->title = $request['title'];
        $category->save();
        Session::flash('success', 'The category has been successfully added');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $category = Category::find($id);
        if ($category) {
            return view('categories.show')->with(['category' => $category]);
        }
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);
        return view('categories.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //$this->validate($request, $this->rules);
        $category = Category::find($id);
        $category->title = $request['title'];
        $category->save();
        Session::flash('success', 'The category was successfully updated.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'The category was successfully deleted.');
        return redirect()->route('categories.index');
    }
    
}
