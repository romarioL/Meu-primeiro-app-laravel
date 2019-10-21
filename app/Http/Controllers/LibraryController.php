<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Author;

use App\Book;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $author;

    protected $book;

    public function __construct(Author $author, Book $book)
    {
           $this->author = $author;

           $this->book = $book;    
    }


    public function index()
    {

     $author=   $this->author->find(1)->books()->get();

         return response()->json($author);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $this->book->create($request->all());

        return response()->json(["success" => "Book registered with success"]);
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
        //
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
       $book =  $this->book->find($id);

       $book->update($request->all());

       return response()->json(['success' => "Book  updated  with success"]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);

        $book->delete();

        return response()->json(['success' => "Book deleted with success"]);

    }
}
