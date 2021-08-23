<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of books
     *
     * @return Illuminate\Http\Response
     */
    public function index() {
        $books = Book::all();

        return $this->successResponse($books);
    }

    /**
     * create one new book
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|max:11',
            'author_id' => 'required|max:11'
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Return a single book
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $book) {
        $book = Book::findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * Update an book
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $book) {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'max:11',
            'author_id' => 'max:11'
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if($book->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Destroy an book
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $book) {
        $book = Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);
    }
}
