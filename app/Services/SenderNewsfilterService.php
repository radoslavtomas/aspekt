<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SenderNewsfilterService implements NewsfilterService
{

    public function subscribe(string $email): bool
    {
        $senderData = [
            'email' => $email,
            'groups' => [config('newsletter.services.sender.group')],
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('newsletter.services.sender.api_token'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post(config('newsletter.services.sender.url'), $senderData);
        } catch (Exception $e) {
            Log::error('Failed to subscribe '.$email.' to Njuvinky newsletter');
            Log::error($e->getMessage());
            $response = null;
        }

        return (bool)$response;
    }
}
