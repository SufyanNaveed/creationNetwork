<?php 

namespace App\Services\ChatGPT;
use GuzzleHttp\Client;
use Http;

class ChatService {
    protected $baseUrl = 'https://api.openai.com/v1/chat/completions';

    public function generateResponse($prompt)
    {
        $client = new Client();

        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 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',
            ],
            'json' => [
                'messages' => [
                    ['role' => 'system', 'content' => $prompt],
                ],
                'model' => 'gpt-3.5-turbo',
            ],
        ]);

        $completion = json_decode($response->getBody(), true);

        return $completion['choices'][0];
    }
    public function generateAudioResponse($audioContents)
    {

       $gptResponse = Http::withHeaders([
        'Authorization' => 'Bearer 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',
        ])->post('https://api.openai.com/v1/audio/transcriptions', [
           'audio' => base64_encode($audioContents),
       ]);

       dd($gptResponse);
        $completion = json_decode($gptResponse->getBody(), true);

        return $completion['choices'][0];
    }
}