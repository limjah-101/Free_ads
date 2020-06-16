<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function create(Request $request)
    {
    
        $this->validate($request, [
            "title" => "required",
            "subtitle" => "required",                  
            "status" => "required",

        ], [
            "title.required" => "Veuillez rentrer un titre |",
            "subtitle.required" => "Veuillez rentrer un sous titre |",                              
            "status.required" => "Veuillez choisir un status |"
        ]);

        //HANDLE FILE
        $this->validate($request, [
            'image' => 'required|max:1999'
        ], ["image.required" => "Veuillez choisir une image de moins de 2MB",
            "image.max:1999" => "Taille de l'image 2MB maximum"
        ]);

        if ($request->hasFile('image')){

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();            
            $filenameToStore = $filename . '_' . time() . '.' . $extension;            
            $path = $request->file('image')->storeAs('public/cover_images', $filenameToStore);
        
        } else {
            $filenameToStore = 'no_image.jpg';
        }
        
        $slider = new Slider();

        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;    
        $slider->images = $filenameToStore;        
        $slider->status = $request->status;

        $slider->save();

        return redirect()->to('/admin/add-slider')->with("success", "Slider was created successfully.");
    }

    /**
     * 
     */
    public function turnSliderOn($id)
    {
        $product  = Slider::where('id', $id)
                            ->update(['status' => '1']);

        return redirect()->to('/admin/sliders')->with("success", "Slider was activated successfuly");
    }

    /**
     * 
     */
    public function turnSliderOff($id)
    {
        $product  = Slider::where('id', $id)
                            ->update(['status' => '0']);
                            
        return redirect()->to('/admin/sliders')->with("success", "Slider was Unactivated successfuly");
    }

    /**
     * Delete a single slider
     */
    public function delete($id)
    {
        $product = Slider::find($id);
        $product->delete();

        return redirect()->to('/admin/sliders')->with('success', 'le slider a bien été supprimé de votre base de donnée.');
    }
    
}
