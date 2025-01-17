<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class DeveloperHelper
{
    public function getTotalWork($developer)
    {
        return $developer->tasks()->sum(DB::raw('sure * zorluk')) ;
    }

    public function getWorkLoad($developer)
    {
        $totalWork = $this->getTotalWork($developer);
        return $totalWork / $developer->zorluk;
    }

    public function updateWorkLoad($developer)
    {
        $developer->load = $this->getWorkLoad($developer);
        $developer->save();
    }
}
