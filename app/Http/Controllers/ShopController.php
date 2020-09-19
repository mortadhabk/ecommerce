<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Shop;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {

        $shop = Shop::findOrfail($id);
        return view('shop.index', compact('shop'));


    }

    //test with postman
    public function test()
    {
        $users = User::permission('edit articles')->get();
        return response($users);
    }
    //end test
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request, User $user)
    {

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
    public function edit($id)
    {

        $shop = Shop::findOrfail($id);
        $this->authorize('update', $shop);
        return view('shop.edit', compact('shop'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, $id)
    {

        $shop = Shop::findOrfail($id);

        $this->authorize('update', $shop);

        $input = $request->all();

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('imagets', $name);
            $input['image'] = $name;
        }

        $input['user_id'] = $shop->user_id;
        if ($request->file('image')) {
        $shop->image = $input['image'];
    }
        $shop->title = $input['title'];
        $shop->slug = Str::slug($input['title']);
        $shop->description = $input['description'];
        $shop->user_id = $input['user_id'];
        $shop->save();

        return redirect("/shop/{$shop->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    //le seule qui peut supprimer le Shop est l'admin
    {if (\Gate::allows('isAdmin')) {

        $shop = Shop::findOrfail($id);
        $shop->user()->delete();
        $shop->delete();


        return redirect()->route('home');


    } else {

        return redirect()->route('home');

    }
    }
}
