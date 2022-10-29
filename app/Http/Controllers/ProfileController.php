<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile')->with(['user' => auth()->user()]);
    }

    public function update() {
        
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'min:8|confimred|nullable',
            'avatar' => 'mimes:jpg,jpeg,png,',
        ]);

        if(request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if(request()->hasFile('avatar')) {
            $path = request('avatar')->store('users');
            $data['avatar'] = $path;

            Storage::delete(auth()->user()->avatar);
        }

        User::findOrFail(auth()->id())->update($data);

        return back();
    }
}
