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
        $authors = Author::all();

        return $this->successResponse($authors);
    }

    /**
     * create one new author
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    /**
     * Return a single author
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $author) {
        $author = Author::findOrFail($author);

        return $this->successResponse($author);
    }

    /**
     * Update an author
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $author) {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'country' => 'max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if($author->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }

    /**
     * Destroy an author
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $author) {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);
    }
}
