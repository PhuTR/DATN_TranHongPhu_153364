<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class AdminRoleController extends Controller
{
    public function index(Request $request){

        $roles = Role::whereRaw(1);
        $roles = $roles->orderByDesc('id')->get();
     
        $viewData = [
            'roles' => $roles,
            'query'      => $request->query()

        ];
        return view('admin.pages.role.index', $viewData);
       
    }

    public function create(){
        
        $all_permissions  = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        $viewData = [
            'all_permissions' => $all_permissions,
            'permission_groups' => $permission_groups,
        ];
        return view('admin.pages.role.create',$viewData);
    }

    public function store(Request $request){
        try{
            $data = $request->except('_token');
            $data['guard_name'] = 'admins';
            $data['created_at'] = Carbon::now();
            $role = Role::create(['name' => $request->name, 'guard_name' => 'admins']);
            // $permissions = $data['permission'];
            $permissions = $request->input('permissions');
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            return redirect()->route('get_admin.role.index');
            
        }catch(Exception $e){
            Log::error("-----------".$e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        $role = Role::findById($id, 'admins');
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        $viewData = [
            'all_permissions' => $all_permissions,
            'permission_groups' => $permission_groups,
            'role' => $role, 
        ];
        return view('admin.pages.role.update',$viewData);
    }

    public function update($id,Request $request){
        try{
            $data = $request->except('_token');
            $data['updated_at'] = Carbon::now();
            $data['guard_name'] = 'admins';
            $role = Role::findById($id, 'admins');
            $permissions = $request->input('permissions');
            $role->syncPermissions($permissions);
            
            $role->update($data);
            
            return redirect()->route('get_admin.role.index');
            
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->back();
    }
}
