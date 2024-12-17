<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Show the feedback form
    public function index()
    {
        return view('feedbacks.index');  // Render the feedback form (index.blade.php)
    }

    // Handle the feedback submission
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comments' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Create the feedback entry in the database
        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'comments' => $request->comments,
            'rating' => $request->rating,
        ]);

        // Redirect back with a success message
        return redirect()->route('feedback.index')->with('success', 'Thank you for your feedback!');
    }
    public function store(Request $request)
    {
        $request->validate([
            'EMAIL' => 'required|email',
            'COMMENT' => 'required|string|max:500',
            'RATING' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create([
            'EMAIL' => $request->EMAIL,
            'COMMENT' => $request->COMMENT,
            'RATING' => $request->RATING,
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Feedback submitted successfully!');
    }
}
