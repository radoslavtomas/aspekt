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
            'groups' => [env('SENDER_GROUP_ID')]
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.env('SENDER_API_TOKEN'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post(env('SENDER_SUBSCRIBE_URL'), $senderData);
        } catch (Exception $e) {
            Log::error('Failed to subscribe '.$email.' to Njuvinky newsletter');
            Log::error($e->getMessage());
            $response = null;
        }

        return (bool)$response;
    }
}
