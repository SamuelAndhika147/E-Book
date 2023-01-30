<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


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
        $categories = Category::all();
        return view('dashboard-user', compact('book', 'user', 'categories'));
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
        $kategori = Category::all();
        $book = Book::all();
        return view('create', compact('book', 'kategori'));
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

        if (User::create($validatedata)){
        Alert::success('Success', 'Success Register!');
        return redirect('/');
        } 
        Alert::error('Error', 'Error to Register, please fill all the form!');
        return redirect('/');
        
    }

    public function postLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth()->user()->role == 'admin'){
                Alert::success('Success', 'Success Login sebagai admin!');
                return redirect('/dashboard');
            } else {
                Alert::success('Success', 'Success Login!');
                return redirect()->intended('/dashboard-user');
            }
        }

        Alert::error('Error', 'Failed Login, perhatikan email atau passwordnya!');
        return back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Alert::info('Info', 'Berhasil Logout!');
        return redirect('/');
    }


   

    //Category
    public function postCategory(Request $request){
        $request->validate([
            'kategori' => 'required'
        ]);

        Category::create([
            'kategori' =>$request->kategori,
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
