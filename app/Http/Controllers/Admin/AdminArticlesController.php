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

        $articles = $articles->orderByDesc('id')->get();

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
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
               $data['avatar'] = $file['name'];
            }
        } 
       
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
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
               $data['avatar'] = $file['name'];
            }
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
