<?php

namespace App\Providers\TaskProviders;

use App\Providers\TaskProviders\Providers\Provider1;
use App\Providers\TaskProviders\Providers\Provider2;

class ProviderFactory
{
    public static function create($providerName)
    {
        return match ($providerName) {
            'provider1' => new Provider1(),
            'provider2' => new Provider2(),
            default => throw new \Exception("Unknown provider: $providerName"),
        };
    }
}
