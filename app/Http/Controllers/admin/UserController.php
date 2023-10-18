<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::all();
        return view(('admin.users.index'), compact('users'));
    }
    public function show(User $user){
        $roles=Role::all();
        $permissions=Permission::all();

        return view('admin.users.role',compact('user','roles','permissions'));
    }
    public function giveRole(Request $request,User $user){
        if ($user->hasRole($request->role)) {
            return back()->with('message','Role Exist !!!');
        }
        $user->assignRole($request->role);
        return back()->with('message','Role Added !!!');
    }
    public function revokeRole(User $user,Role $role){
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message','Role Removed !!!');
        } 
        return back()->with('message','Role Not Exists !!!');
    }
    public function givePermission(Request $request,User $user){
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message','Permission Exist !!!');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message','Permission Added !!!');
    }
    public function revokePermission(User $user, Permission $permission){
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message','Permission Revoked !!!');
        } 
        return back()->with('message','Permission Not Exists !!!');
    }
    public function destroy(User $user){
        if($user->hasRole('admin')){

            return back()->with('message','You Are Admin !!!');
        }
        $user->delete();
        return back()->with('message','User Deleted !!!');
    }
    public function showproducts(User $user) {
        $products = Product::where('user_id', $user->id)->get();
        return view('admin.users.showproducts', compact('user', 'products'));
    }
   
    
}
