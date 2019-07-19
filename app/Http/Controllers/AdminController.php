<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User\UserCollection;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function index()
    {
        // return UserCollection::collection(User::paginate(10));
    }

    /**
     * Return list of users with their assigned roles
     */
    public function allUsers()
    {
        // Check if user has the admin role
        $userRoles = Auth::user()->roles->pluck('name');
        if (!$userRoles->contains('Super Administrator')) {
            return response([
                'error' => 'You are not permitted to view this resource'
            ], Response::HTTP_UNAUTHORIZED);
        } else {
            // $users = User::with('roles')->get();
            $users = User::with('roles')->paginate(10);
            return response([
                'data' => $users,
            ], Response::HTTP_OK);
        }
    }

    public function giveSuperAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'Super Administrator')->firstOrFail();
        $user->roles()->attach($adminRole->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeSuperAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $adminRole = Role::where('name', 'Super Administrator')->firstOrFail();
        $user->roles()->detach($adminRole->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Administrator')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeAdmin($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Administrator')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveExecutive($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Executive')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeExecutive($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Executive')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveManager($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Manager')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeManager($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Manager')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveAccounting($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Accounting')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeAccounting($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Accounting')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveHeadOfDepartment($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Head Of Department')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeHeadOfDepartment($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Head Of Department')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveTreasurySupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Treasury Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeTreasurySupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Treasury Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveTreasuryOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Treasury Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeTreasuryOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Treasury Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveCashProcessingSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Processing Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeCashProcessingSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Processing Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveCashProcessingOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Processing Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeCashProcessingOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Processing Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveVaultSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Vault Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeVaultSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Vault Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveVaultOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Vault Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeVaultOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Vault Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveBoxroomSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Boxroom Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeBoxroomSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Boxroom Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveBoxroomOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Boxroom Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeBoxroomOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Boxroom Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveCashMovementSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Movement Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeCashMovementSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Movement Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveCashMovementOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Movement Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeCashMovementOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Cash Movement Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveClientSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Client Supervisor')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeClientSupervisor($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Client Supervisor')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

    public function giveClientOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Client Officer')->firstOrFail();
        $user->roles()->attach($role->id);
        return response([
            'data' => 'Role successfully assigned to user',
        ], Response::HTTP_CREATED);
    }

    public function removeClientOfficer($userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $role = Role::where('name', 'Client Officer')->firstOrFail();
        $user->roles()->detach($role->id);
        return response([
            'data' => 'Role successfully removed from user',
        ], Response::HTTP_CREATED);
    }

}
