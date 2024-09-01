<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        return view('admin/users', compact("users"));
        
        
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $new_user = new User();
        $new_user->name = $request->fullname;
        $new_user->email = $request->email;
        $new_user->password = $request->password;
        $new_user->username = $request->username;
        $new_user->active = $request->has('active') ? 'yes' : 'no';
        $new_user->save();
        
        return redirect('admin_users/all');

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
        $user=User::find($id);
        return view('admin/edituser',compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id',$id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'active' => $request->has('active') ? 'yes' : 'no',
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('admin_users/all');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
