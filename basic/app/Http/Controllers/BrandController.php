<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }
    public function store(Request $request){

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

        ],
        [
            'brand_name.required' => 'please enter a name',
            'brand_image.required' => 'please enter an image',
        ]);


        $brand_image=$request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_image= $up_location.$img_name;
        $brand_image->move($up_location,$img_name);


        $brand = new Brand;
        $brand->brand_name=$request->brand_name;
        $brand->brand_image=$last_image;
        $brand->save();

// the toaster
        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );         
        return Redirect()->back()->with($notification);    }
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|max:255',

        ],
        [
            'brand_name.required' => 'please enter a name',
        ]);


        $old_image=$request->old_image;
        $brand_image=$request->file('brand_image');

        
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_image= $up_location.$img_name;
            $brand_image->move($up_location,$img_name);


            unlink($old_image);
            $brand=Brand::find($id);
            $brand->brand_name=$request->brand_name;
            $brand->brand_image=$last_image;
            $brand->save();
            return Redirect()->back()->with('success','brand updated successfully');


        }
        else {
            $brand=Brand::find($id);
            $brand->brand_name=$request->brand_name;
            $brand->save();
            return Redirect()->back()->with('success','brand updated successfully');        
        }

        
    }

    public function delete($id)
    {
        $brand=Brand::find($id);
        $old_image=$brand->brand_image;
        unlink($old_image);


        Brand::find($id)->delete();
        return Redirect()->back()->with('success','brand deleted successfully');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success','you are logged out');
    }

}
