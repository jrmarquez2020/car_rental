<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Other methods...

    /**
     * Display a listing of the feedbacks for the admin.
     *
     * @return \Illuminate\View\View
     */
    public function adminIndex()
    {
        // Fetch all feedbacks
        $feedbacks = Feedback::all();  // You can add pagination or sorting if needed

        // Pass the feedbacks to the admin view
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    // Other methods...
}
