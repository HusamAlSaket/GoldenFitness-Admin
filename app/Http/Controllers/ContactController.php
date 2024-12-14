<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('users.contact.index');
    }

    public function store(Request $request)
    {
        // Validate message input
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Store the message if the user is logged in
        if (Auth::check()) {
            Message::create([
                'user_id' => Auth::id(),
                'message' => $request->message,
            ]);

            return back()->with('success', 'Your message has been sent successfully.');
        }

        return back()->with('error', 'You must be logged in to send a message.');
    }
}