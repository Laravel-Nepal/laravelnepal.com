<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Newsletter\SubscribeToNewsletterRequest;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;

final class SubscribeToNewsletter extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SubscribeToNewsletterRequest $subscribeToNewsletterRequest): RedirectResponse
    {
        Subscriber::query()
            ->updateOrCreate(
                [
                    'email' => $subscribeToNewsletterRequest->get('email'),
                ], [
                    'unsubscribed_at' => null,
                    'ip_address' => $subscribeToNewsletterRequest->ip(),
                    'user_agent' => $subscribeToNewsletterRequest->userAgent(),
                ]
            );

        return back()->with('subscribed', true);
    }
}
