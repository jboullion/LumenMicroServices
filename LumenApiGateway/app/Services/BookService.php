<?php 

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService 
{
	use ConsumesExternalService;

	/**
	 * The base uri to consume the books service
	 *
	 * @var string
	 */
	public string $baseUri;

	public function __construct()
	{
		$this->baseUri = config('services.books.base_uri');
	}

	/**
	 * Obtain the full list of books from the book service
	 *
	 * @return string
	 */
	public function obtainBooks()
	{
		return $this->performRequest('GET', '/books');
	}

	/**
	 * Obtain a single book from the book service
	 *
	 * @return string
	 */
	public function obtainBook(int $book)
	{
		return $this->performRequest('GET', "/books/{$book}");
	}

	/**
	 * Create an book on the book service
	 *
	 * @return string
	 */
	public function createBook(array $data)
	{
		return $this->performRequest('POST', '/books', $data);
	}

	/**
	 * Update an book on the book service
	 *
	 * @return string
	 */
	public function updateBook(array $data, int $book)
	{
		return $this->performRequest('PATCH', "/books/{$book}", $data);
	}

	/**
	 * Delete a single book from the book service
	 *
	 * @return string
	 */
	public function destroyBook(int $book)
	{
		return $this->performRequest('DELETE', "/books/{$book}");
	}
}