<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
class AdminCategoryController extends Controller
{
    public function index(){

        $categories = Category::orderByDesc('id')->paginate(15);;
        $viewData = [
            'categories' => $categories,
        ];
        return view('admin.pages.category.index', $viewData);
       
    }

    public function create(){
        $categories = Category::where('id')->get();
        $viewData = [
            'categories' => $categories,
        ];
        return view('admin.pages.category.create',$viewData);
    }

    public function store(Request $request){
        try{
            $data = $request->except('_token');
            $data['slug'] = Str::slug($request->name);
            $data['created_at'] = Carbon::now();
           
            $category = Category::create($data);
           
            return redirect()->route('get_admin.category.index');
            
        }catch(Exception $e){
            // Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
        $categries = Category::find($id);
        // $categries = Location::where('parent_id',0)->get();
        $viewData = [
            'categries' => $categries,
            
           
        ];
        return view('admin.pages.category.update',$viewData);
    }

    public function update($id,Request $request){
        try{
            $data = $request->except('_token');
            $data['slug'] = Str::slug($request->name);
            $data['udpated_at'] = Carbon::now();
           
            Category::find($id)->update($data);
           
            return redirect()->route('get_admin.category.index');
            
        }catch(Exception $e){
            // Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
