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
        $roles = $roles->orderByDesc('id')->paginate(15);;
     
        $viewData = [
            'roles' => $roles,
            'query'      => $request->query()

        ];
        return view('admin.pages.role.index', $viewData);
       
    }

    public function create(){
        
        $permissions = Permission::orderByDesc('id')->get();
        $viewData = [
            'permissions' => $permissions,
        ];
        return view('admin.pages.role.create',$viewData);
    }

    public function store(Request $request){
        try{
            $data = $request->except('_token');
            $data['guard_name'] = 'admins';
            $data['created_at'] = Carbon::now();
            $role = Role::create(['name' => $request->name, 'guard_name' => 'admins']);
            $permissions = $data['permission'];
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
        $roles = Role::find($id);
        $permissions = Permission::orderByDesc('id')->get();
        $viewData = [
            'permissions' => $permissions,
            'roles' => $roles, 
        ];
        return view('admin.pages.role.update',$viewData);
    }

    public function update($id,Request $request){
        try{
            $data = $request->except('_token');
            $data['updated_at'] = Carbon::now();
            $data['guard_name'] = 'admins';
            $role = Role::find($id);
            $role->syncPermissions($data['permission']);
            
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
