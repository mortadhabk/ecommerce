<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Image;
use App\Price;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $products = Product::orderBy('created_at', 'DESC')->paginate(6);
// return response()->json(["products"=>$products, "message"=>"Hello world"]);
        return view('admin.product.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $shop = Shop::findOrFail($id);
        $this->authorize('update', $shop);
        return view('shop.products.create', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = Shop::findOrFail(request()->shopid);
        $this->authorize('update', $shop);
        $data = $request->validate([
            'title' => 'required|string|max:20 ',
            'description' => 'required|string|max:200',
            'subtitle' => 'required|string|max:30',

        ]);

        $dataprice = $request->validate([
            'price' => 'required|integer',
        ]);
        $dataimages = $request->validate([
            'images' => 'required|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $images = array();
        if ($files = $dataimages['images']) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('imagets', $name);
                $images[] = $name;
            }
            $dataimages['images'] = $images;
        }
        $shop_id = $shop->id;
        $arrayshopid = ['shop_id' => $shop_id];
        $slug = ['slug' => Str::slug($data['title'])];
        $product = Product::create(array_merge(
            $data,
            $arrayshopid,
            $slug
        ));

        $price = [
            'isActive' => 1,
            'product_id' => $product->id,
        ];
        $images = [
            'isActive' => 1,
            'product_id' => $product->id,
        ];

        $prices = Price::create(array_merge(
            $dataprice,
            $price
        ));

        foreach ($dataimages['images'] as $image) {
            $images = new Image();
            $images->image = $image;
            if ($dataimages['images'][0] == $image) {
                $images->isActive = 1;
            } else {
                $images->isActive = 0;
            }
            $images->product_id = $product->id;
            $images->save();
        }
        $category = $request->validate([
            'category' => 'required',
        ]);
        //   $price->product_id =
        if ($category) {
            foreach ($category as $key => $value) {
                $product->categories()->attach((int) $value);
            }
        }
        return redirect('/shop/' . $shop_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::findOrFail($id);
        return view('shop.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('update', $product->shop);
        if (!$product) {
            return redirect()->route('shop.products.show')->with(['error' => 'NOT FOUND DZL']);
        } else {
            return view('shop.products.edit', compact('product'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);
        $this->authorize('update', $product->shop);

        $input = $request->except('_token', 'price', 'addprice', 'category', 'slug', 'images');
        $dataimages = $request->images;
        if ($files = $dataimages) {

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('imagets', $name);
                $images[] = $name;
            }
            $dataimages['images'] = $images;

        }

        $slug = ['slug' => Str::slug($request->title)];

        $product->update($input);

        $product->update($slug);
        if ($request->category) {
            for ($i = 0; $i < 6; $i++) {
                $product->categories()->detach($i);
                // code to repeat here
            }

            foreach ($request->category as $key => $value) {
                $product->categories()->attach((int) $value);
            }
        }
        if($dataimages){
            foreach ( $product->images as $image) {
                $image->delete();
            }

        foreach ($dataimages['images'] as $image) {

            $images = new Image();
            $images->image = $image;
            if ($dataimages['images'][0] == $image) {
                $images->isActive = 1;
            } else {
                $images->isActive = 0;
            }
            $images->product_id = $product->id;
            $images->save();
        }
        }
        if ($request->price) {

            foreach ($product->prices as $prix) {

                $prix->isActive = 0;
                $prix->save();
            }

            $price = Price::findOrfail($request->price);
            $price->isActive = true;
            $price->save();
        } else if ($request->addprice != null) {
            foreach ($product->prices as $prix) {
                $prix->isActive = false;
                $prix->save();
            }
            $addprice = new Price();
            $addprice->price = $request->addprice;
            $addprice->isActive = true;
            $addprice->product_id = $product->id;
            $addprice->save();
        }
        return view('shop.products.show', compact('product'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $product = Product::findOrfail($id);
        $this->authorize('update', $product->shop);
        $product->delete();
        return redirect()->route('home');

    }

}
