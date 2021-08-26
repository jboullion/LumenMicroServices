<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
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
     * Return the list of users
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index() {
        $users = User::all();

        return $this->validResponse($users);
    }

    /**
     * create one new user
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $fields = $request->all();

        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return a single user
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function show(int $user) {
        $user = User::findOrFail($user);

        return $this->validResponse($user);
    }

    /**
     * Update a user
     *
     * @param Request $request
     * @return \App\Traits\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     *
     */
    public function update(Request $request, int $user) {
        $rules = [
            'name' => 'max:255',
            'email' => 'email|unique:users,email,'.$user,
            'password' => 'min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if($user->isClean()){
            return $this->errorResponse('At least one value must change', ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /**
     * Destroy an user
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy(int $user) {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }

    /**
     * Identify an existing user
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
