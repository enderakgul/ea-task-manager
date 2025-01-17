<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;

class IndexController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $developers = Developer::all();
        return view('welcome', compact('tasks', 'developers'));
    }
}
