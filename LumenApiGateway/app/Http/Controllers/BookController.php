<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\BookService;
use App\Services\AuthorService;


class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the books microservice
     * @var BookService
     */
    public $bookService;

    /**
     * The service to consume the authors microservice
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Return the list of books
     *
     * @return Illuminate\Http\Response
     */
    public function index() 
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * create one new book
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
       $this->authorService->obtainAuthor((int)$request->author_id);

       return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return a single book
     *
     * @return Illuminate\Http\Response
     */
    public function show(int $book) 
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Update an book
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $book) 
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $book));
    }

    /**
     * Destroy an book
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(int $book) 
    {
        return $this->successResponse($this->bookService->destroyBook($book));
    }
}
