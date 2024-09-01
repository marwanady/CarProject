<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;



class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function submit(Request $request)
    {
        $contact = new Contact();
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->email = $request->email;
        $contact->message = $request->msg;
        $contact->save();

        $messageContent = "
            Name: {$contact->firstname} {$contact->lastname}
            Email: {$contact->email}
            Message: {$contact->message}
        ";
        
        Mail::raw($messageContent, function ($message) use ($contact) {
            $message->to('info@yourdomain.com')
                    ->subject('New Contact Message from ' . $contact->firstname." ".$contact->lastname)
                    ->from($contact->email);
        });

        return back()->with('success', 'Message sent successfully!');
    
}
    public function index() 
        {
            $messages=Contact::get();
            return view('admin/messages', compact('messages'));
            
        }

    public function show (string $id) {
        $msg=Contact::findOrFail($id);
        return view('admin/showMessage', compact('msg'));


    }
    public function destroy(string $id):RedirectResponse{
        
        Contact::where('id',$id)->delete();
        return redirect('admin_messages/all');
    }

    
    
}
