<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(9);
        return view('home',compact('products'));

    }
    public function slug()
    {
       // $shops = Shop:: orderBy('id','desc')->paginate(9);
       // return view('home',compact('shops'));
    }
}
