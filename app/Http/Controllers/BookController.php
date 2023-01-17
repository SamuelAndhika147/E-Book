<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'isbn' => 'required',
            'synopsis' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif',
        ]);

        
        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();
        
        if(!file_exists(public_path('/img/cover-books/' .$image->getClientOriginalName()))){
            $destinationPath = public_path('/img/cover-books/');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        } else {
            $uploaded = $image->getClientOriginalName();
        }

        Book::create([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'image' => $uploaded,
            'isbn' => $request->isbn,
            'synopsis' => $request->synopsis,
        ]);

        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $book = Book::where('id', $id)->first();
        return view('edit-book', compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'publisher' => 'required',
            'category' => 'required',
            'isbn' => 'required',
            'synopsis' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif',
        ]);

        $image = $request->file('image');
        $imgName = time().rand().'.'.$image->extension();
        
        if(!file_exists(public_path('/img/cover-books/' .$image->getClientOriginalName()))){
            $destinationPath = public_path('/img/cover-books/');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        } else {
            $uploaded = $image->getClientOriginalName();
        }

        Book::where('id', $id)->update([
            'title' => $request->title,
            'writer' => $request->writer,
            'publisher' => $request->publisher,
            'category' => $request->category,
            'image' => $uploaded,
            'isbn' => $request->isbn,
            'synopsis' => $request->synopsis,
        ]);

        return redirect('/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        return redirect('/create');
    }
}
