<?php

namespace App\Providers\TaskProviders\Providers;

use App\Providers\TaskProviders\Interfaces\ProviderInterface;
use App\Services\MockFetcher;

class Provider1 implements ProviderInterface
{
    public function fetchData(): array
    {
        $url = 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one';
        $fetcher = new MockFetcher($url, 'provider1');
        return $fetcher->fetchTasks();
    }

    public function getName(): string
    {
        return 'Provider 1';
    }
}
