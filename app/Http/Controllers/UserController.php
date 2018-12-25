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

    //TOOD: multiple addresses
    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'street' => 'required',
            'city' => 'required',
            'zip_code' =>
                array(
                    'required',
                    'regex:/^[0-9]{2}-[0-9]{3}?$/'
                )
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        $address = new Address([
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'user_id' => $user->id
        ]);

        $address->save();

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
                error_log('Idzie redirect!');
                return redirect($oldUrl);
            }
            return redirect()->route('user.profile', ['id' => Auth::user()->id]);
        }

        return redirect('/');
    }

    public function getProfile($id) {
        $user = User::where('id', $id)->first();
        $addresses = $user->addresses;
        $orders = $user->orders;

        return view('user.profile')->with('user', $user)->with('addresses', $addresses)->with('orders', $orders);
    }

    public function getLogout() {
        Auth::logout();

        return redirect('/');
    }
}
