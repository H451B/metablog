<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted successfully');
    }

    public function sendEmail(Request $request)
    {
        // dd($request);
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Retrieve the first contact email from settings
        $settings = Setting::first();
        // $firstContactEmail = $settings ? ($settings->contacts['email_addresses'][0] ?? null) : null;
        $firstContactEmail = "am.hasibulhasan@gmail.com";

        if (!$firstContactEmail) {
            return redirect()->back()->with('error', 'No contact email found in settings.');
        }

        $subscribers = Subscriber::all();
        $subject = $request->input('subject');
        $body = $request->input('body');

        foreach ($subscribers as $subscriber) {
            Mail::raw($body, function ($message) use ($subscriber, $subject, $firstContactEmail) {
                $message->to($subscriber->email)
                        ->subject($subject)
                        ->from($firstContactEmail);
            });
        }

        return redirect()->back()->with('status', 'Emails sent successfully!');
    }
}
