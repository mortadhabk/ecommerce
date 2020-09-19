<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Shop;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(6);
        // return response()->json(["products"=>$products, "message"=>"Hello world"]);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {    $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->email = $data['email'];
        $user->approved = 1;
        $user->password = Hash::make($data['password']);
        $user->syncRoles('businessman');
        $user->save();
        /* End User inscription */
        /* Shop inscription */
        // Move Image Directory
        if ($file = $data['image']) {
            $name = $file->getClientOriginalName();
            $file->move('imagets', $name);
            $data['image'] = $name;
        }
        // End  Move Image Directory
        $shop = new Shop();
        $shop->image = $data['image'];
        $shop->title = $data['title'];
        $shop->slug = Str::slug($data['title']);
        $shop->description = $data['description'];
        $shop->user_id = $user->id;
        $shop->save();



        return redirect()->route('admin.user',compact('users'))->with(['success' => 'User Created']);
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
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if (!$user) {
            return redirect()->route('admin.user')->with(['error' => 'Pas de Users']);
        } else {
            return view('admin.users.edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = user::where('id', $id)->firstOrFail();
        $input = $request->except('_token');
        $user->update($input);
        return redirect()->route('admin.user')->with(['success' => 'User Created']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->route('admin.user');
    }
}
