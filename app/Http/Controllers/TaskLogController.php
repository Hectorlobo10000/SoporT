<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TaskLog;

class TaskLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }

    public function destroy(TaskLog $task_log)
    {
        $task_log->delete();
        return redirect()->route('tasks.history');
    }

}
