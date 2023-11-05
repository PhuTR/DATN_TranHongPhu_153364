<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Exception;
class AdminLocationController extends Controller
{
    public function index(Request $request){
        $city = City::whereRaw(1);
        if ($request->n)
            $city->where('name', 'like', '%' . $request->n . '%');

        $city = $city->orderBy('id')->paginate(10);

        $viewData = [
            'city' => $city,
            'query'     => $request->query()
        ];
        return view('admin.pages.location.index', $viewData);
    }

    public function create(){
        $cities = Location::where('parent_id',0)->get();
        $viewData = [
            'cities' => $cities,
        ];
        return view('admin.pages.location.create',$viewData);
    }

    public function store(Request $request){

  
        try{
            $data = $request->except('_token');
            $data['slug'] = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
            if ($request->hasFile('avatar')){
                $file = $request->file('avatar');
                var_dump($file);
                $exten = $file->getClientOriginalExtension();
                if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                    return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
                $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
                while (file_exists('uploads/avatars/'.$Hinh)) {
                     $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
                }
                if(file_exists('uploads/avatar/'.$request->avatar))
                   unlink('uploads/avatars/'.$request->avatar);
    
                $file->move('uploads/avatars',$Hinh);
                $data['avatar'] = $Hinh;
             }  



            $location = Location::create($data);
           
            return redirect()->route('get_admin.location.home');
            
        }catch(Exception $e){
            // Log::error($e->getMessage());
            return redirect()->back();
        }
       
    }


    public function edit($id){
        $city = City::find($id);

        $viewData = [
           
            'city' => $city,
           
        ];
        return view('admin.pages.location.update',$viewData);
    }

    public function update($id,Request $request){

  
        try{
            $data = $request->except('_token');
            $data['slug'] = Str::slug($request->name);
            $data['udpated_at'] = Carbon::now();
            if ($request->hasFile('avatar')){
                $file = $request->file('avatar');
                var_dump($file);
                $exten = $file->getClientOriginalExtension();
                if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                    return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
                $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
                while (file_exists('uploads/avatars/'.$Hinh)) {
                     $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
                }
                if(file_exists('uploads/avatar/'.$request->avatar))
                   unlink('uploads/avatars/'.$request->avatar);
    
                $file->move('uploads/avatars',$Hinh);
                $data['avatar'] = $Hinh;
             }  



            City::find($id)->update($data);
           
            return redirect()->route('get_admin.location.home');
            
        }catch(Exception $e){
            // Log::error($e->getMessage());
            return redirect()->back();
        }
       
    }
}
