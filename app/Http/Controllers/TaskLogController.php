<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TaskLog;

class TaskLogController extends Controller
{

     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }
      public function history()
    {
      $task_logs = TaskLog::orderBy('created_at','asc')->paginate(20);
      return view('/client_menu/task_history',compact('task_logs'));
    }

    public function destroy(TaskLog $task_log)
    {
        $task_log->delete();
        return redirect()->route('tasks.history');
    }
}
