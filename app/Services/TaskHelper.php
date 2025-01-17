<?php

namespace App\Services;

class TaskHelper
{
    private $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function setDeveloper($developer): void
    {
        $this->task->developer_id = $developer;
        $this->task->save();
    }
}
