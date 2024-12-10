<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Admin feedback view
    public function adminIndex()
    {
        $feedbacks = Feedback::latest()->get(); // Fetch all feedback sorted by latest
        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Delete feedback
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('admin.feedbacks.index')->with('success', 'Feedback deleted successfully!');
    }
}
