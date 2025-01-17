<?php

namespace App\Providers\TaskProviders\Interfaces;

interface ProviderInterface
{
    public function fetchData(): array;
    public function getName(): string;
}
