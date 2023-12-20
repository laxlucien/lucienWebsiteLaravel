<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use App\Models\photos;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
        return view('pages.about');
    }

    public function login(){
        return view('pages.login');
    }

    public function register(){
        return view('pages.register');
    }

    public function sudoku(){
        return view('pages.sudoku');
    }

    public function loginError(){
        return view('pages.loginError');
    }

    public function profile(){
        $user = users::all();
        $photo = photos::all();
        return view ('pages.profile', compact('user'), compact('photo'));
    }

    public function editUser($id){
        $user = users::find($id);
        return view('pages.changeUserInfo', compact('user'));
    }

    public function fightingGame(){
        return view('pages.fightingGame');
    }

    public function updateUser(Request $request, $id){
        $user = users::find($id);
        $user->username = $request->input('username');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        if($request->hasfile('pfp')){
            $file = $request->file('pfp');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/profiles/', $filename);
            $user->pfp = $filename;
        }
        $user->update();

        return redirect('/profile')->with('status', 'User updated successfully');
    }

    public function savePassword(Request $request, $id){
        $user = users::find($id);
        if($request->password1 == $request->password2){
            $passwordBefore = $request->input('password1');
            $user->password = bcrypt($passwordBefore);
            $user->save();

            return redirect()->back()->with('status', 'User password has been updated successfully!');
        }else{
            return redirect()->back()->with('status', 'ERROR: The inputted passwords did not match!');
        }
    }

    public function updatePassword($id){
        $user = users::find($id);
        return view('pages.changeUserPassword', compact('user'));
    }

    public function store(Request $request){
        $user = new users;
        $user->username = $request->input('username');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $passwordBefore = $request->input('password');
        $user->password = bcrypt($passwordBefore);
        $user->save();

        return redirect('/login')->with('status', 'User added successfully');
    }

    public function checkValid(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('status', 'You have logged in');
        }

        return redirect('/loginError')->with('status', 'Error with the login credentials');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'You have logged out');
    }
}
