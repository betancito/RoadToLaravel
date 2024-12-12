<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordNotifier
{
    private $webhookUrl;

    public function __construct()
    {
        $this->webhookUrl = env('DISCORD_WEBHOOK_URL');
    }

    public function sendMessage(string $message)
    {
        $data = ['content' => $message];
        $this->sendRequest($data);
    }

    public function sendEmbed(array $embed)
    {
        $data = ['embeds' => [$embed]];
        $this->sendRequest($data);
    }

    protected function sendRequest(array $data)
    {
        $response = Http::withOptions(['verify' => false])
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($this->webhookUrl, $data);

        if ($response->failed()) {
            \Log::error('Error sending discord message', ['response' => $response->body()]);
        }
    }
}
