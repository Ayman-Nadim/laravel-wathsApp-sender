<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

Route::post('/send', function (Request $request) {
    $clients = $request->input('clients');
    $image = $request->input('image'); // Image commune à tous

    $accessToken = env('WHATSAPP_ACCESS_TOKEN');
    $phoneNumberId = env('WHATSAPP_PHONE_NUMBER_ID');
    $endpoint = "https://graph.facebook.com/v22.0/{$phoneNumberId}/messages";

    foreach ($clients as $client) {
        $response = Http::withToken($accessToken)
            ->withHeaders(['Content-Type' => 'application/json'])
            ->withoutVerifying() 
            ->post($endpoint, [
                'messaging_product' => 'whatsapp',
                'to' => $client['phone'],
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => ['code' => 'en_US'],
                    'components' => [
                        [
                            'type' => 'header',
                            'parameters' => [
                                [
                                    'type' => 'image',
                                    'image' => [
                                        'link' => $image
                                    ]
                                ]
                            ]
                        ],
                        [
                            'type' => 'body',
                            'parameters' => [
                                ['type' => 'text', 'text' => $client['name']],
                                ['type' => 'text', 'text' => $client['DatePaiement']]
                            ]
                        ]
                    ]
                ]
            ]);

        // Log de la réponse HTTP complète
        Log::info('Message sent to client', [
            'to' => $client['phone'],
            'response_status' => $response->status(), // Le code de statut HTTP
            'response_body' => $response->body(), // Le corps de la réponse
            'response_json' => $response->json(), // Si la réponse est en JSON, on peut la parser
        ]);

        // Optionnel : Vérifier la réussite de la requête
        if ($response->successful()) {
            Log::info('Message sent successfully to', [
                'to' => $client['phone'],
                'message' => 'Message sent successfully.'
            ]);
        } else {
            Log::error('Error sending message to', [
                'to' => $client['phone'],
                'error' => $response->body()
            ]);
        }
    }

    return response()->json(['status' => 'Messages sent to all clients']);
});
