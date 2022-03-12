<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        // $categories=Category::all();
        $categories=Category::latest()->paginate(5);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trashCat'));
    }


    public function store(Request $request){
         

        // eloquent ORM

        $category = new Category;
        $category->category_name=$request->category_name;
        $category->user_id=Auth::user()->id;
        $category->save();


        // QUERY BUILDER 

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Category inserted successfully');
    }


    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));


    }
    public function update(Request $request,$id){
        // $category=Category::find($id);
        // $category->category_name=$request->category_name;
        // $category->user_id=Auth::user()->id;
        // $category->save();

        // QUERY BUILDER 

        $data=array();
        $data['category_name']=$request->category_name;
        $data['user_id']=Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);


        return Redirect()->route('all.category')->with('success','Category updated successfully');
    }


    public function softdelete($id){
        $delete=Category::find($id)->delete();
        return Redirect()->back()->with('success','Category softdeleted successfully');
    }

    public function restore($id){
        $delete=Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category restored successfully');
    }
    public function pDelete($id){
        $delete=Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category permanently successfully');
    }
    

}
