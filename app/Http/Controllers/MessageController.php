<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToMessageMail;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $repliedCount = Message::where('is_replied', true)->count();
        $unrepliedCount = Message::where('is_replied', false)->count();
    
        return view('admins.messages.index', compact('messages', 'repliedCount', 'unrepliedCount'));
    }
    

    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }

    public function reply(Request $request, string $id)
    {
        $message = Message::findOrFail($id);
        $user = $message->user;

        if (!$user) {
            return redirect()->route('messages.index')->with('error', 'User not found for this message.');
        }

        // Send email using Laravel's Mailable
        Mail::to($user->email)->send(new ReplyToMessageMail($request->reply));
        // dd($request);
        $message->is_replied=true;
        $message->save();
        return redirect()->route('messages.index')->with('success', 'Reply sent successfully.');
    }
    public function store(Request $request){
        $request->validate([
            // 'name' => 'required|string|max:225',
            // 'email' => 'required|email|max:225',
            'message' => 'required|string|max:225',

        ]);
        Message::create([
            // 'name' =>$request->input('name') ,  
            // 'email'=>$request->input('email') ,
            'user_id' => Auth::id(),
            'message'=>$request->input('message') ,
        ]);
        return redirect()->route('contact.index')->with('success','Message Sent Successfully');
    }
}
