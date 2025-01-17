<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

class DeveloperHelper
{
    public function getWorkLoad($developer)
    {
        return $developer->tasks()->sum(DB::raw('sure * zorluk'));
    }

    public function updateWorkLoad($developer)
    {
        $developer->load = $this->getWorkLoad($developer);
        $developer->save();
    }
}
