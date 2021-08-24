<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
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
     * Return the list of authors
     *
     * @return Illuminate\Http\Response
     */
    public function index() {
      
    }

    /**
     * create one new author
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) {
       
    }

    /**
     * Return a single author
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $author) {
      
    }

    /**
     * Update an author
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $author) {
     
    }

    /**
     * Destroy an author
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $author) {
      
    }
}
