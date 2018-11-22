<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskTypeStoreRequest;
use App\Http\Requests\TaskTypeUpdateRequest;
use App\TaskType;


class TaskTypeController extends Controller
{
     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }

    public function index()
    {
        $tipos = TaskType::paginate(20);
        return view('admin_menu.task_types',compact('tipos'));
    }

    public function create()
    {
         return view('admin_menu.add_task_type');
    }

    public function store(TaskTypeStoreRequest $request)
    {
        $tipoact = new TaskType(['name'=>$request->input('name')]);
        $tipoact->save();

        return redirect()->route('actividades.index');
    }

    public function edit($id)
    {
        $tipo=TaskType::find($id);
        return view('admin_menu.edit_task_type',compact('tipo'));
    }

    public function update(TaskTypeUpdateRequest $request, $id)
    {
        $tipo = TaskType::find($id);
        $tipo->name =$request->input('name');
        $tipo->save();
        return redirect()->route('actividades.index');
    }

    public function destroy($id)
    {
        TaskType::find($id)->delete();
        return redirect()->route('actividades.index');

    }
}
