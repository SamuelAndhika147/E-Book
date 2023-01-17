<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index() {
        return view('landing');
    }

    public function register(){
        return view('register');
    }
    
    public function login(){
        return view('login');
    }
    
    public function dashboard(){
        $users = User::where('id', Auth::user()->id)->first();
        return view('dashboard', compact('users'));
    }

    public function dashboardUser(){
        $user = User::where('id', Auth::user()->id)->first();
        $book = Book::all();
        return view('dashboard-user', compact('book', 'user'));
    }

    public function readBook($id){
        $user = User::where('id', Auth::user()->id)->first();
        $book = Book::where('id', $id)->first();
        return view('read', compact('book', 'user'));
    }

    public function user(){
        $user = User::all();
        return view('user', compact('user'));
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('edit-user', compact('user'));
    }

    public function create(){
        $category = Category::all();
        $book = Book::all();
        return view('create', compact('book', 'category'));
    }
    
    public function category(){
        $category = Category::all();
        return view('category', compact('category'));
    }




    //Action Users Account
    public function update(Request $request, $id){
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'city' => 'required',
            'no_hp' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        User::where('id', $id)->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
            'city' => $request->city,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/user');
    }

    public function destroy($id){
        User::where('id', $id)->delete();

        return redirect('/user');
    }
    



    //Register, Login, Logout
    public function postRegister (Request $request){
        $validatedata = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'city' => 'required',
            'no_hp' => 'required',
        ]);

        $validatedata['password'] = bcrypt($validatedata['password']);

        User::create($validatedata);

        return redirect('/')->with('berhasil', 'Register Berhasil, Silahkan Login!');
    }

    public function postLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth()->user()->role == 'admin'){
                return redirect('/dashboard');
            } else {
                return redirect()->intended('/dashboard-user')->with('berhasil', 'Login Berhasil');
            }
        }

        return back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }


   

    //Category
    public function postCategory(Request $request){
        $request->validate([
            'category' => 'required'
        ]);

        Category::create([
            'category' =>$request->category,
        ]);
        
        return back();
    }

    public function destroyCategory($id){
        Category::where('id', $id)->delete();
        return back();
    }
     





    public function notFound(){
        return view('404');
    }
}
