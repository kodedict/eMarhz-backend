<?php

namespace App\Http\Controllers\API\general;

use App\Http\Controllers\API\apiController as apiController;
use App\User;
use App\UserProfile;
use App\Role;
use Illuminate\Http\Request;

class userController extends apiController
{
    //

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return $this->sendResponse($accessToken,'success');

    }

    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request['password']);

        $user = User::query()->create($validatedData);

        UserProfile::query()->create([
            'userID'      => $user['id'],
            'billingInfo' => 'nil'
        ]);

        $user->roles()->attach(Role::query()->where('name','Customer')->first());

        $accessToken = $user->createToken('authToken')->accessToken;

        return $this->sendResponse($accessToken,'success');
    }

//    protected function forgetPW(Request $request){}
}
