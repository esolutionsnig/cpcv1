<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Register new user
     * @param  [string] surname
     * @param  [string] firstname
     * @param  [string] othernames
     * @param  [string] phone_number
     * @param  [string] username
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] data
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'surname' => 'required',
            'firstname' => 'required',
            'othernames' => 'required',
            'phone_number' => 'required|unique:users',
            'username' => 'required|unique:users|max:30',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|min:7',
            'password_confirmation' => 'required|min:7|same:password',
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return response([
                'error' => $validator->errors()
            ], Response::HTTP_UNAUTHORIZED);
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] = $user->createToken('AppName')->accessToken;
            return response([
                'message' => 'Successfully created user!',
                'data' => $success,
                'user' => $user
            ], Response::HTTP_CREATED);
        }
    }

    /**
     * Authenticate User
     * @param  [string] username
     * @param  [string] email
     * @param  [string] password
     * @return [string] data
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')]) || Auth::attempt(['username' => request('username'), 'password' => request('password')]) || Auth::attempt(['phone_number' => request('phone_number'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('AppName')->accessToken;
            return response([
                'message' => 'Authentication successful!',
                'data' => $success,
                'user' => $user
            ], Response::HTTP_CREATED);
        } else {
            return response([
                'message' => 'Authentication failed',
                'error' => 'Unauthorised'
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Get User
     * @return [string] data
     */
    public function getUser() {
        $user = Auth::user();
        $userRoles = $user->roles->pluck('name');
        if (!$userRoles->contains('Admin')) {
            return response([
                'error' => 'You are not permitted to view this resource'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response([
            'data' => $user
        ], Response::HTTP_OK);
    }

}
