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
use Spatie\Permission\Models\Permission;

class AdminAccountController extends Controller
{public function index(Request $request){

    $admins = Admin::whereRaw(1);
    // $admins = Admin::with('roles','permissions')->get();
    // dd($admin);
    if ($request->n)
    $admins->where('name', 'like', '%' . $request->n . '%');
    $admins = $admins->orderByDesc('id')->paginate(15);;
 
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
        $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = Carbon::now();
        
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
               $data['avatar'] = $file['name'];
            }
        }
      
        Admin::create($data);
        return redirect()->route('get_admin.account.index');
        
    }catch(Exception $e){
        Log::error("-----------".$e->getMessage());
        return redirect()->back();
    }
}

public function edit($id){
    $admin = Admin::find($id);
    $roles = Role::orderByDesc('id')->paginate(15);
    $all_column_roles = $admin->roles->first();
    $get_permission_via_role = $admin->getPermissionsViaRoles();
    $permissions = Permission::orderByDesc('id')->get();
    $viewData = [  
        'permissions' => $permissions, 
        'admin' => $admin, 
        'roles' => $roles,
        'get_permission_via_role' => $get_permission_via_role,
        'all_column_roles' => $all_column_roles,
    ];
    return view('admin.pages.account.update',$viewData);
}

public function update($id,Request $request){
    try{
        $data = $request->except('_token');
        $data['udpated_at'] = Carbon::now();
        $data['password'] = bcrypt($request->password);
        $admin = Admin::find($id);
        $admin->syncRoles($data['role']);

        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
               $data['avatar'] = $file['name'];
            }
        }
        Admin::find($id)->update($data);
       
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
