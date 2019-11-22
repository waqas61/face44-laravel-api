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

}
