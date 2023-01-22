<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Validator;
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
        $books = Book::all();

        return $books;
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
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|Integer|max:40',
            'category'=>'required',
            'user_id'=>'required'


        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $book=new Book;
        $book->name=$request->name;
        $book->description=$request->description;
        $book->price=$request->price;
        $book->user_id=Auth::user()->id;
        $book->category=$request->category;
        

        $book->save();

        return response()->json(['Knjiga je sacuvana!',new BookResource($book)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    

    public function show(Book $book)
    {
       return new BookResource($book);
    }

    public function getByCategory($id)
    {
        $books = Book::get()->where('category',$id);
        return $books;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'price'=>'required|Integer|max:40',
            'category'=>'required',
            'user_id'=>'required'


        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $book->name=$request->name;
        $book->description=$request->description;
        $book->price=$request->price;
        $book->user_id=Auth::user()->id;
        $book->category=$request->category;
       

        $result=$book->update();

        if($result==false){
            return response()->json('Promjene nisu sacuvane!');
        }
        return response()->json(['Promjene su uspjesno sacuvane!',new BookResource($book)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json('Knjiga je uspjesno obrisana!');
    }

    public function my_books(Request $request){
        $book=Book::get()->where('user_id',Auth::user()->id);
        if(count($book)==0){
            return 'You do not have saved books!';
        }
        $myBooks=array();
        foreach($book as $b){
            array_push($myBooks,new BookResource($b));
        }

        return $myBooks;
    }
}
