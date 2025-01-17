<?php

namespace App\Services;

class TaskAssigner
{
    public function assignTasks($tasks, $developers)
    {
        $devLoads = [];
        foreach ($developers as $dev) {
            $devLoads[$dev->id] = 0;
        }

        $assignments = [];
        foreach ($tasks as $task) {
            $bestDev = null;
            $minWeightedLoad = INF;

            foreach ($developers as $dev) {
                $load = $task->sure * $task->zorluk;
                $weightedLoad = ($load / $dev->zorluk) + $devLoads[$dev->id] ?? 0;

                if ($weightedLoad < $minWeightedLoad) {
                    $minWeightedLoad = $weightedLoad;
                    $bestDev = $dev->id;
                }
            }

            $devLoads[$bestDev] = $minWeightedLoad;
            $assignments[$task->id] = $bestDev;
        }

        return $assignments;
    }
}
