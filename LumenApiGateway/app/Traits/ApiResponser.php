<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{

	/**
	 * Build a success response
	 *
	 * @param string|array $data
	 * @param int $code
	 * @return Illuminate\Http\JsonResponse
	 */
	public function successResponse($data, $code = Response::HTTP_OK) {
		return response($data, $code)->header('Content-Type', 'application/json');
	}

	/**
	 * Build an error response from gateway
	 *
	 * @param string|array $message
	 * @param int $code
	 * @return Illuminate\Http\JsonResponse
	 */
	public function errorResponse($message, $code) {
		return response()->json(['error' => $message, 'code' => $code], $code);
	}

	/**
	 * Return an error response from micro services
	 *
	 * @param string|array $message
	 * @param int $code
	 * @return Illuminate\Http\JsonResponse
	 */
	public function errorMessage($message, $code) {
		return response($message, $code)->header('Content-Type', 'application/json');
	}


}
