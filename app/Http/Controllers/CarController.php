<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;

use Illuminate\Http\RedirectResponse;


class CarController extends Controller
{
    public function index()
    {
        $cars=Car::get();
        return view('admin/cars', compact("cars"));
        
        
   
    }

    
    public function create()
    {
        $categories= Category::all();
       
        return view('admin/addCar',compact('categories'));
    }

    public function store(Request $request) :RedirectResponse
    {
        
         $new_car= new Car();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = file_get_contents($image);
        } else {
             $imageData = $new_car->image;
        }
    
        $new_car->title = $request->title;
        $new_car->content = $request->content;
        $new_car->luggage = $request->luggage;
        $new_car->doors = $request->doors;
        $new_car->passengers = $request->passengers;
        $new_car->price = $request->price;
        $new_car->active = $request->has('active') ? 'yes' : 'no';
        $new_car->image = $imageData;
        $new_car->category_id = $request->input('category_id');
       
        $new_car->save();
        
        return redirect('admin_cars/all');

    }

     public function show(string $id)
    {
        $categories = Category::withCount('cars')->get();
        $car=Car::findOrFail($id);
        return view('single', compact('car','categories'));

    }

     public function edit(string $id){
        $car=Car::find($id);
        $categories= Category::all();
       

        return view('admin/editCar',compact('car','categories'));
    }
    

      public function update(Request $request, string $id)
    {
        
  
        $car = Car::findOrFail($id);
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageData = file_get_contents($image);
    } else {
         $imageData = $car->image;
    }

    $car->title = $request->title;
    $car->content = $request->content;
    $car->luggage = $request->luggage;
    $car->doors = $request->doors;
    $car->passengers = $request->passengers;
    $car->price = $request->price;
    $car->active = $request->has('active') ? 'yes' : 'no';
    $car->image = $imageData;
    $car->category_id = $request->input('category_id');
   
       
       $car->save();
       return redirect('admin_cars/all');

       
    }

    
    public function destroy(string $id)
    {
        
    $car = Car::find($id);
    $car->delete();
    return redirect('admin_cars/all');
    
    }
    

    

}
