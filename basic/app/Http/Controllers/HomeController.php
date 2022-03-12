<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function homeSlider()
    {
        
        $sliders=Slider::all();
        return(view('admin.slider.index',compact('sliders')));
    }
    public function addSlider()
    {
        return(view('admin.slider.create'));
    }
    public function storeSlider(Request $request)
    {
     

        $brand_image=$request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_image= $up_location.$img_name;
        $brand_image->move($up_location,$img_name);


        $slider = new Slider;
        $slider->title=$request->title;
        $slider->description=$request->description;
        $slider->image=$last_image;
        $slider->save();
        return Redirect()->route('home.slider')->with('success','slider inserted successfully');
    }
}
