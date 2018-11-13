<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
class TechnicianController extends Controller
{
   	public function __construct()
    {
    }
	private $tasks;

	public function pending(){
    	$tasks = Task::all()->where('technician_id',Auth::id());
      return view('technician_menu.pending',compact('tasks'));
    }
    public function initiated(){
      $tasks = Task::all()->where('technician_id',Auth::id());
  		return view('technician_menu.initiated',compact('tasks'));
    }
    public function finished(){
      $tasks = Task::all()->where('technician_id',Auth::id());
  		return view('technician_menu.finished',compact('tasks'));
    }


    public function showAnnotation(Task $task){
      if($task->technician_id==Auth::id()){
        return view('technician_menu.annotation.show',compact('task'));
      }else{
        return abort(404);
      }

    }

    public function editAnnotation(Task $task){
      if($task->technician_id==Auth::id()){
        return view('technician_menu.annotation.edit',compact('task'));
      }else{
        return abort(404);
      }
    }
    public function updateAnnotation(Request $request,Task $task){
      $request->validate([
        'annotation'=>'required'
      ]);
      $task->update($request->all());
      return redirect()->route('show task annotation',compact('task'));
    }

    public function updateState(Request $request,Task $task){
      $request->validate([
        'task_state_id'=>'required'
      ]);
      $task->update($request->all());
      return redirect()->back();
    }
}
