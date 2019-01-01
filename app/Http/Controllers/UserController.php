<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup() {
        return view('user.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'name' => 'required',
            'surname' => 'required',
            'city.*' => 'required|min:1',
            'zip.*' => 'required|min:1|regex:/^[0-9]{2}-[0-9]{3}?$/',
            'street.*' => 'required|min:1'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'type' => User::DEFAULT_TYPE,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
        ]);

        $user->save();

        // iteraste through all addresses and add them
        $streets = $request->all()['street'];
        $cities = $request->all()['city'];
        $zip_codes = $request->all()['zip'];
        $no_elements = count($streets);

        for ($i = 0; $i < $no_elements; ++$i) {
            $address = new Address([
                'street' => $streets[$i],
                'city' => $cities[$i],
                'zip_code' => $zip_codes[$i],
            ]);
            $user->addresses()->save($address);
         }

        Auth::login($user);
        if(Session::has('oldUrl')) {
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redrect($oldUrl);
        }

        return redirect('/');
    }

    public function getSignin() {
        return view('user.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        // try to log in the user
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if(Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect($oldUrl);
            }
            return redirect()->route('user.profile', ['id' => Auth::user()->id]);
        }

        return redirect('/');
    }

    // TODO: extract the unserialization to model
    public function getProfile($id) {
        $user = User::where('id', $id)->first();
        $addresses = $user->addresses;
        $orders = $user->orders;
        // unserialzie serialized cart
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('user.profile')->with('user', $user)->with('addresses', $addresses)->with('orders', $orders);
    }

    public function getLogout() {
        Auth::logout();

        return redirect('/');
    }


}
