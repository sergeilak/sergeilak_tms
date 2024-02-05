<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function submit()
    {
        $name = request()->input('name');
        $email = request()->input('email');

        $validatedData = request()->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
        ]);


        return response()->json(['message' => 'Feedback submitted successfully!']);
    }
}
