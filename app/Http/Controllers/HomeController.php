<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $books = Book::orderBy('created_at','ASC')->paginate(5);
        return view('lists',[
            'books' => $books,
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required|min:3|unique:books',
            'author' => 'required|min:3',
            'description' => 'min:5',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->passes()){

            $books = new Book;
            $books->title = $request->title;
            $books->author = $request->author;
            $books->description = $request->description;
            $books->status = $request->status;
            $books->save();

            $message = "Book added successfully";

            Session()->flash('success',$message);
            return response()->json([
                'status' => true,
                'message' => $message,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function destroy(Request $request){
        $id = $request->id;
        $book = Book::find($id);
        if($book == null){
            Session()->flash('error', 'Book not found.');
            return response()->json([
                'status' => false,
            ]);
        }

        $book->delete();
        Session()->flash('success','Book deleted successfully.');
        return response()->json([
            'status' => true,
            'message' => 'Book deleted successfully.',
        ]);
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('edit',[
            'book' => $book,
        ]);
    }

    public function update(Request $request, $id){

        $rules = [
            'title' => 'required|min:3|unique:books,title,'.$id.',id',
            'author' => 'required|min:3',
            'description' => 'min:5',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        $book = Book::findOrFail($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->status = $request->status;
        $book->save();

        $message = "Book updated successfully.";
        Session()->flash('success',$message);
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
        
    }


}
