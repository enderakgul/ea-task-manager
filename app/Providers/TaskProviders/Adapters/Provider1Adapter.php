<?php

namespace App\Providers\TaskProviders\Adapters;

use App\Providers\TaskProviders\Interfaces\ProviderAdapterInterface;

class Provider1Adapter implements ProviderAdapterInterface
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getIsim(): string
    {
        return $this->data['id'];
    }

    public function getSure(): int
    {
        return $this->data['estimated_duration'];
    }

    public function getZorluk(): int
    {
        return $this->data['value'];
    }
}
