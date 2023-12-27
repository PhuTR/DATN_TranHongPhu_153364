<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminAccountController extends Controller
{public function index(Request $request){

    $admins = Admin::whereRaw(1);
    // $admins = Admin::with('roles','permissions')->get();
    // dd($admin);
    if ($request->n)
    $admins->where('name', 'like', '%' . $request->n . '%');
    $admins = $admins->orderByDesc('id')->get();
 
    $viewData = [
        'admins' => $admins,
        'query'      => $request->query()

    ];
    return view('admin.pages.account.index', $viewData);
   
}

public function create(){
    $roles = Role::orderByDesc('id')->paginate(15);
    $viewData = [
        'roles' => $roles,
    ];
    return view('admin.pages.account.create',$viewData);
}

public function store(Request $request){
    try{
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $admin->avatar = $file['name'];
            }
        }
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }
        return redirect()->route('get_admin.account.index');
        
    }catch(Exception $e){
        Log::error("-----------".$e->getMessage());
        return redirect()->back();
    }
}

public function edit($id){
    $admin = Admin::find($id);
    $roles  = Role::all();
    $viewData = [  
        'admin' => $admin, 
        'roles' => $roles,
    ];
    return view('admin.pages.account.update',$viewData);
}

public function update($id,Request $request){
    try{
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $admin->avatar = $file['name'];
            }
        }
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }
        return redirect()->route('get_admin.account.index');
        
    }catch(Exception $e){
        // Log::error($e->getMessage());
        return redirect()->back();
    }
}

public function delete($id)
{
    Admin::find($id)->delete();
    return redirect()->back();
}

}
