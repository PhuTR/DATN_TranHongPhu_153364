<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UserRoomRequest;
use App\Models\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class AdminArticlesController extends Controller
{
    public function index(Request $request){
        $articles = Articles::whereRaw(1);

        if ($request->n)
            $articles->where('name', 'like', '%' . $request->n . '%');

        $articles = $articles->orderByDesc('id')->paginate(10);

        $viewData = [
            'articles' => $articles,
            'query'     => $request->query()
        ];
        return view('admin.pages.article.index',$viewData);
    }

    public function create(){
        return view('admin.pages.article.create');
    }

    public function store(Request $request){

        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $data['slug'] = Str::slug($request->name);
        // $data['status']     = Room::STATUS_EXPIRED;
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar123-'.$request->name.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar123-'.$request->name.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$request->avatar))
               unlink('uploads/avatars/'.$request->avatar);

            $file->move('uploads/avatars',$Hinh);
            $data['avatar'] = $Hinh;
        } 
        dd($data);
        $articles = Articles::create($data);
        if($articles){
            return redirect()->route('get_admin.article.index');
        }else{
           return redirect()->back();
        }
    }
    public function edit(Request $request,$id){
        $article = Articles::find($id);
        $viewData = [
            'article' => $article,
        ];
  
        return view('admin.pages.article.update',$viewData);
    }
    public function update($id,Request $request){
        
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar123-'.$request->name.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar123-'.$request->name.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$request->avatar))
               unlink('uploads/avatars/'.$request->avatar);

            $file->move('uploads/avatars',$Hinh);
            $data['avatar'] = $Hinh;
         }  

        $article = Articles::where(['id' => $id])->update($data);
        if($article){
            return redirect()->route('get_admin.article.index');
        }else{
           return redirect()->back();
        }
    }

    public function delete($id)
    {
        Articles::find($id)->delete();
        return redirect()->back();
    }
}
