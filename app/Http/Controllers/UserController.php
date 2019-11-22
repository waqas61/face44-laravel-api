<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource; 
use App\Http\Resources\UserResourceCollection; 

class UserController extends Controller
{

    /**
     * @param User $user
     * @return Response
     */
    public function show(User $user) : UserResource {
    	return new UserResource($user);
    }

    /**
     * @return UserResourceCollection
     */
    public function index(): UserResourceCollection
    {   
        $users = User::get();
        $dataset = $users->map(function ($user) {
            return $user->only(['id', 'phone' , 'email' ,'first_name', 'last_name']);
        });
        return new UserResourceCollection($dataset);
    }

    /**
     * @param UserRequest $request
     * @return UserResource
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        return new UserResource($user);
    }

    /**
     * @param User $user
     * @param UserRequest $request
     * @return UserResource
     */
    public function update(User $user, UserRequest $request): UserResource
    {
        $user->update($request->all());
        return new UserResource($user);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json();
    }

}
