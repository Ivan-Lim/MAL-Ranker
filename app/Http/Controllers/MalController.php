<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class MalController extends Controller
{
    public function getUserAnimeList(Request $request): JsonResponse
    {
        $request->validate([
            'username' => 'required|string|max:255'
        ]);

        $username = $request->input('username');
        $clientId = config('services.mal.client_id');

        if (!$clientId) {
            return response()->json([
                'error' => 'MAL API client ID not configured'
            ], 500);
        }

        try {
            $response = Http::withHeaders([
                'X-MAL-CLIENT-ID' => $clientId,
            ])->get("https://api.myanimelist.net/v2/users/{$username}/animelist", [
                'sort' => 'list_score',
                'status' => 'completed',
                'offset' => 0,
                'limit' => 600,
                'nsfw' => 'true',
                'fields' => 'list_status,score'
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                return response()->json([
                    'error' => 'Failed to fetch anime list from MAL API',
                    'status' => $response->status(),
                    'message' => $response->body()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while fetching anime list',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
