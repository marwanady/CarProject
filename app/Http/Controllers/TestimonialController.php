<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;


class TestimonialController extends Controller
{
    public function testimonial(){
        $testimonials=Testimonial::get();
        return view('testimonials', compact('testimonials'));
    }
    public function index()
    {
        $testimonials=Testimonial::get();
        return view('admin/testimonials', compact("testimonials"));
        
        
   
    }

    
    public function create()
    {
        return view('admin/addTestimonials');
    }

    public function store(Request $request) :RedirectResponse
    {
       
        $image = $request->file('image');
        $imagedata= file_get_contents($image);
        $new_testimonial= new Testimonial();
        $new_testimonial->name = $request->name;
        $new_testimonial->position = $request->position;
        $new_testimonial->content = $request->content;
        $new_testimonial->published = $request->has('published') ? 'yes' : 'no';
        $new_testimonial->image = $imagedata;
        $new_testimonial->save();
        
        return redirect('admin_testimonials/all');

    }

     public function show(string $id)
    {
        //
    }

     public function edit(string $id){
        $testimonial=Testimonial::find($id);
        return view('admin/editTestimonials',compact('testimonial'));
    }
    

      public function update(Request $request, string $id)
    {
        
  
    $testimonial = Testimonial::findOrFail($id);
  if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageData = file_get_contents($image);
    } else {
         $imageData = $testimonial->image;
    }

        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->content = $request->content;
        $testimonial->published = $request->has('published') ? 'yes' : 'no';
        $testimonial->image = $imageData;

       
       $testimonial->save();
       return redirect('admin_testimonials/all');

       
    }

    
    public function destroy(string $id)
    {
        
    $testimonial = Testimonial::find($id);
    $testimonial->delete();
    return redirect('admin_testimonials/all');
    
    }


}
