<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToMessageMail;

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
}
