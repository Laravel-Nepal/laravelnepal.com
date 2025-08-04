<?php

namespace App\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeToNewsletterRequest;
use App\Models\Subscriber;

class SubscriberToNewsletter extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SubscribeToNewsletterRequest $request)
    {
        Subscriber::query()
            ->updateOrCreate([
                'email' => $request->email,
            ], [
                'unsubscribed_at' => null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
    }
}
