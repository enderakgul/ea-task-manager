<?php

namespace App\Services;

use App\Providers\TaskProviders\Adapters\Provider1Adapter;
use App\Providers\TaskProviders\Adapters\Provider2Adapter;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MockFetcher
{
    private string $url;
    private string $provider;

    public function __construct(string $url, string $provider)
    {
        $this->url = $url;
        $this->provider = $provider;
    }

    public function fetchTasks(): array|null
    {
        try {
            $response = Http::get($this->url);

            // Check for successful response (status code 2xx)
            if ($response->successful()) {

                // Attempt to decode the JSON response
                $data = $response->json();

                // Check if JSON decoding was successful and data is an array
                if (is_array($data)) {
                    $adaptedData = [];
                    foreach ($data as $task) {
                        if ($this->provider == 'provider1') {
                            $adaptedData[] = new Provider1Adapter($task);
                        } elseif ($this->provider == 'provider2') {
                            $adaptedData[] = new Provider2Adapter($task);
                        } else {
                            Log::error("Unknown provider: " . $this->provider);
                            return null;
                        }
                    }
                    return $adaptedData;
                } else {
                    Log::error("Invalid JSON format received from URL: " . $this->url);
                    return null;
                }
            } else {
                // Log the error with the status code
                Log::error("HTTP request failed with status code: " . $response->status() . " for URL: " . $this->url);
                return null;
            }
        } catch (\Exception $e) {
            // Catch any exceptions during the process (e.g., network errors)
            Log::error("Error fetching data from URL " . $this->url . ": " . $e->getMessage());
            return null;
        }
    }
}
