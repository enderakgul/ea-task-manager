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
            if ($response->successful()) {
                // Json sonuçu array olarak güncellenir
                $data = $response->json();

                // JSON decodingde sorun var mi kontrol edilir
                if (is_array($data)) {
                    $adaptedData = [];
                    foreach ($data as $task) {
                        if ($this->provider == 'provider1') {
                            $adaptedData[] = new Provider1Adapter($task);
                        } elseif ($this->provider == 'provider2') {
                            $adaptedData[] = new Provider2Adapter($task);
                        } else {
                            Log::error("Provider sorunu: " . $this->provider);
                            return null;
                        }
                    }
                    return $adaptedData;
                } else {
                    Log::error("JSON format sorunu URL: " . $this->url);
                    return null;
                }
            } else {
                // Log the error with the status code
                Log::error("HTTP request sorunu: " . $response->status() . " URL: " . $this->url);
                return null;
            }
        } catch (\Exception $e) {
            // Catch any exceptions during the process (e.g., network errors)
            Log::error("Provider datası çekilmesinde sorun oluştu " . $this->url . ": " . $e->getMessage());
            return null;
        }
    }
}
