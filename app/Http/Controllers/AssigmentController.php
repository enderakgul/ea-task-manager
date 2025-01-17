<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;
use App\Services\TaskAssigner;
use App\Services\TaskHelper;

class AssigmentController extends Controller
{
    public function assign()
    {
        // Bütün işler zorluklarına göre sıralanır
        $tasks = Task::orderBy('zorluk', 'desc')->get();
        $developers = Developer::all();

        // TaskAssigner sınıfı ile işler yazılımcılara atanır
        $taskAssigner = new TaskAssigner();
        $assigments = $taskAssigner->assignTasks($tasks, $developers);

        // TaskHelper sınıfı ile işlere yazılımcı bilgileri eklenir
        foreach ($tasks as $task) {
            $taskHelper = new TaskHelper($task);
            $taskHelper->setDeveloper($assigments[$task->id]);
        }

        return redirect()->route('home');
    }
}
