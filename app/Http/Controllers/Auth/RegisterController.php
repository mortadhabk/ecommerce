<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Shop;
use App\User;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:100'],
            'image' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        /* User inscription */
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
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
        /* End Shop inscription */
        return $user;
    }
}
