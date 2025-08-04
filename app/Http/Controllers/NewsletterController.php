<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter\SubscribeToNewsletterRequest;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    /**
     * @param SubscribeToNewsletterRequest $request
     * @return RedirectResponse
     */
    public function subscribe(SubscribeToNewsletterRequest $request): RedirectResponse
    {
        \App\Models\Subscriber::query()
            ->updateOrCreate(
                [
                    'email' => $request->get('email')
                ], [
                    'unsubscribed_at' => null,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]
            );

        return to_route("landing-page");
    }
}
