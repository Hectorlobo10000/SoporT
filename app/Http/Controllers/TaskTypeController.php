<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TypeTaskStoreRequest;
use App\Http\Requests\TypeTaskUpdateRequest;
use App\TaskType;


class TaskTypeController extends Controller
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
    public function index()
    {
        $tipos = TaskType::paginate(20);
        return view('admin_menu.task_types',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin_menu.add_typetask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeTaskStoreRequest $request)
    {
        $tipoact = new TaskType(['name'=>$request->input('name')]);
        $tipoact->save();

        return redirect('actividades');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo=TaskType::find($id);
        return view('admin_menu.edit_task_types',compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeTaskUpdateRequest $request, $id)
    {
        $tipo = TaskType::find($id);
        $tipo->name =$request->input('name');
        $tipo->save();
        return redirect('actividades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TaskType::find($id)-delete();
    }
}
