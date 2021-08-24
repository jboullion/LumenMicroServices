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
       
    }

    /**
     * create one new book
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) {
       
    }

    /**
     * Return a single book
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $book) {
       
    }

    /**
     * Update an book
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $book) {
       
    }

    /**
     * Destroy an book
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $book) {
      
    }
}
