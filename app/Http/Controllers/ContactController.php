<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Check rate limit (10 submissions per day per IP)
        $key = 'contact_form:' . $request->ip();
        $attempts = Cache::get($key, 0);
        
        if ($attempts >= 10) {
            return response()->json([
                'success' => false,
                'message' => 'You have reached the daily limit of 10 submissions. Please try again tomorrow.'
            ], 429);
        }
        
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            // Create new contact record
            $contact = Contact::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Create notification for admin
            Notification::createContactFormNotification($contact);

            // Increment rate limit counter
            Cache::put($key, $attempts + 1, now()->addDay());

            return response()->json([
                'success' => true,
                'message' => 'Your message was sent successfully! Please wait, we will reach out to you within 24 hours.'
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Contact form submission error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}