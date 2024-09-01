<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        return view('admin/categories', compact("categories"));
        
        
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $new_category = new Category();
        $new_category->name = $request->name;
        $new_category->save();
        
        return redirect('admin_categories/all');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $category=Category::find($id);
        return view('admin/editcategory',compact('category'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::where('id',$id)->update([
            'name' => $request->name
            ]);
           
                return redirect('admin_categories/all');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    $category = Category::find($id);
    if ($category->cars()->exists()) {

        return response()->json(['error' => ' This category contains cars'], 400);
    }
    $category->delete();
    return redirect('admin_categories/all');
    
    }


}
