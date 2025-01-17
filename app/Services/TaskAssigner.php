<?php

namespace App\Services;

class TaskAssigner
{
    public function assignTasks($tasks, $developers)
    {
        // Yazılımcıların iş yoğunluklarını tutacak dizi
        $devLoads = [];
        foreach ($developers as $dev) {
            $devLoads[$dev->id] = 0;
        }

        // Yazılımcılara iş atama, işin süresi ve zorluğuna göre yapılır,
        // Yazılımcının mevcut iş yoğunluğu da dikkate alınır
        $assignments = [];
        foreach ($tasks as $task) {
            $bestDev = null;
            $minWeightedLoad = INF;

            foreach ($developers as $dev) {
                $load = $task->sure * $task->zorluk;
                $weightedLoad = ($load / $dev->zorluk) + $devLoads[$dev->id];

                if ($weightedLoad < $minWeightedLoad) {
                    $minWeightedLoad = $weightedLoad;
                    $bestDev = $dev->id;
                }
            }

            $devLoads[$bestDev] = $minWeightedLoad;
            $assignments[$task->id] = $bestDev;
        }

        // Hangi işin hangi yazılımcıya atandığını döndür
        return $assignments;
    }
}
