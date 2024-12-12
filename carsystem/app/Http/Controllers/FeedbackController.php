<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // User: Submit feedback
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'nullable|string',
        ]);
        $validated['user_id'] = auth()->id();
        Feedback::create($validated);
        return redirect('/feedbacks')->with('success', 'Feedback submitted successfully!');
    }

    // Admin: View feedback
    public function adminIndex()
    {
        $feedbacks = Feedback::with('car', 'user')->get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }
}
