<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Providers\TaskProviders\ProviderFactory;
use Illuminate\Console\Command;

class FetchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $providers = ['provider1', 'provider2'];

        foreach ($providers as $providerName) {
            $provider = ProviderFactory::create($providerName);
            $tasks = $provider->fetchData();

            foreach ($tasks as $taskData) {
                Task::create([
                    'isim' => $taskData->getIsim(),
                    'sure' => $taskData->getSure(),
                    'zorluk' => $taskData->getZorluk(),
                    'provider' => $provider->getName(),
                ]);
            }
        }

        $this->info('Task datası kaydedildi.');
    }
}
