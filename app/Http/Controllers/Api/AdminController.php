<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function index()
    {
        // Check if user has the admin role
        $userRoles = Auth::user()->roles->pluck('name');
        if (!$userRoles->contains('admin')) {
            return response([
                'error' => 'You are not permitted to view this resource'
            ], Response::HTTP_UNAUTHORIZED);
        } else {
            $users = User::with('roles')->get();
            // return SealingCollection::collection(Sealing::paginate(10));
            return response([
                'data' => $users,
            ], Response::HTTP_OK);
        }

    }

    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return AdminCollection::collection(User::all());
    //     return AdminCollection::collection(User::all());
    // }

    public function giveAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->attach($adminRole->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->detach($adminRole->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

}
