<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->paginate(6);
        // return response()->json(["products"=>$products, "message"=>"Hello world"]);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token']);
        $category = Category::create($input);
        $categories = Category::all();

        return response()->json(["categories" => $categories, "message" => "Hello world"]);
        //  return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        if (!$category) {
            return redirect()->route('admin.category')->with(['error' => 'NOT FOUND DZL']);
        } else {
            return view('admin.category.edit', compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $input = $request->except('_token');
        $category->update($input);
        return redirect()->route('admin.category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.category');
    }
    public function recherche()
    {
        $categories = Category::with('products')->get();
     foreach($categories as $category){
         $category->products; // posts is already loaded and no additional DB query is run
     }

        return response()->json($categories);
    }

}
