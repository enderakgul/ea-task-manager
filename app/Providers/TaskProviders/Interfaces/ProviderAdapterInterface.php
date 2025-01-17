<?php

namespace App\Providers\TaskProviders\Interfaces;

interface ProviderAdapterInterface
{
    public function getIsim(): string;
    public function getSure(): int;
    public function getZorluk(): int;
}
