<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    use ApiResponser;

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
    public function __construct(AuthorService $authorService) 
    {
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index() 
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * create one new author
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request) 
    {
       return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Return a single author
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function show(int $author) 
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * Update an author
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $author) 
    {
        return $this->successResponse($this->authorService->updateAuthor($request->all(), $author));
    }

    /**
     * Destroy an author
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(int $author) 
    {
        return $this->successResponse($this->authorService->destroyAuthor($author));
    }
}
