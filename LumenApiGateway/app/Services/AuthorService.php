<?php 

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService 
{
	use ConsumesExternalService;

	/**
	 * The base uri to consume the authors service
	 *
	 * @var string
	 */
	public string $baseUri;

	public function __construct()
	{
		$this->baseUri = config('services.authors.base_uri');
	}

	/**
	 * Obtain the full list of authors from the author service
	 *
	 * @return string
	 */
	public function obtainAuthors()
	{
		return $this->performRequest('GET', '/authors');
	}

	/**
	 * Obtain a single author from the author service
	 *
	 * @return string
	 */
	public function obtainAuthor(int $author)
	{
		return $this->performRequest('GET', "/authors/{$author}");
	}

	/**
	 * Create an author on the author service
	 *
	 * @return string
	 */
	public function createAuthor(array $data)
	{
		return $this->performRequest('POST', '/authors', $data);
	}

	/**
	 * Update an author on the author service
	 *
	 * @return string
	 */
	public function updateAuthor(array $data, int $author)
	{
		return $this->performRequest('PATCH', "/authors/{$author}", $data);
	}

	/**
	 * Delete a single author from the author service
	 *
	 * @return string
	 */
	public function destroyAuthor(int $author)
	{
		return $this->performRequest('DELETE', "/authors/{$author}");
	}
}