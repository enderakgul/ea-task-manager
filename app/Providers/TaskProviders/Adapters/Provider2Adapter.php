<?php

namespace App\Providers\TaskProviders\Adapters;

use App\Providers\TaskProviders\Interfaces\ProviderAdapterInterface;

class Provider2Adapter implements ProviderAdapterInterface
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
        return $this->data['sure'];
    }

    public function getZorluk(): int
    {
        return $this->data['zorluk'];
    }
}
