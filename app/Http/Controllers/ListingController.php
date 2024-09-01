<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class ListingController extends Controller
{
    public function listing(){

        $cars=Car::get();
        return view('listing',compact('cars'));
    }
}
