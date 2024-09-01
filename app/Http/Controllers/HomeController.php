<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Testimonial;



class HomeController extends Controller
{
    
    public function showLatestCars_testimonials()
    {
        $testimonials = Testimonial::latest()->take(3)->get();

        
        $cars = Car::latest()->take(6)->get();

        return view('index', compact('cars','testimonials'));
    }


}
