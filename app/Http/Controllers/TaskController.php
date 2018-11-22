<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Task;
use App\TaskType;
use App\TaskLog;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller{
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
        $tasks = Task::all();
        return view('client_menu.tasks',compact('tasks'));
    }
    public function history(){
      $task_logs = TaskLog::all();
      return view('/client_menu/task_history',compact('task_logs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $task_types = TaskType::all();
      return view('client_menu.add_task',compact('task_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        $task_type_id = $request->input('task_type_id');
        $place_id = Auth::user()->place_id;
        $request->merge(['technician_id' => $this->getTechnicianId($task_type_id,$place_id)]);
        $request->validate([
          'technician_id' => 'required'
        ],[
          'technician_id.required' => 'No hay técnicos disponibles. Intente mas tarde.'
        ]);
        $task = new Task([
          'task_type_id'=> $task_type_id ,
          'technician_id'=>$request->input('technician_id'),
          'client_id'=>$request->input('client_id'),
          'task_state_id' => 1,
          'description'=> $request->input('description')
        ]);

        $task->save();
        $task_log = new TaskLog([
          'task_id' => $task->id,
          'task_state_id' => $task->task_state_id
        ]);
        $task_log->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task_types = TaskType::all();
        return view('client_menu.edit_task',compact('task','task_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request,Task $task)
    {
        $task_type_id = $request->input('task_type_id');
        $place_id = Auth::user()->place_id;
        $request->merge(['technician_id' => $this->getTechnicianId($task_type_id,$place_id)]);
        $request->validate();
        $task->technician_id = $request->input('technician_id');
        $task->task_type_id =$request->input('task_type_id');
        $task->description =$request->input('description');
        $task->save();
        return redirect()->route('tasks.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    private function getTechnicianId(int $task_type_id, int $place_id){
     //busca el tecnico con menos tareas pendientes que tenga el mismo tipo de actividad de la tarea y que pertenezca al mismo lugar que el cliente
      $data = DB::Select(
        DB::raw(
            "select b.technician_id as id, b.username, b.task_type, count(a.task_state_id) as cantidad_pendientes
            from tasks as a
            inner join (
                select a.id as technician_id ,a.name as username, c.name as task_type
                from users as a
                inner join users_x_task_types as b
                on (a.id = b.user_id)
                inner join task_types as c
                on (b.task_type_id = c.id)
                where (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2)
            ) as b
            on (a.technician_id = b.technician_id)
            where a.task_state_id=1
            group by a.technician_id
            ORDER BY cantidad_pendientes asc
            limit 1;"
        )
      );
      //busca el tecnico con menos tareas iniciadas que tenga el mismo tipo de actividad de la tarea y que pertenezca al mismo lugar que el cliente
      if (!$data){
        $data = DB::Select(
            DB::raw(
                "select b.technician_id as id, b.username, b.task_type, count(a.task_state_id) as cantidad_iniciadas
                from tasks as a
                inner join (
                  select a.id as technician_id ,a.name as username, c.name as task_type
                  from users as a
                  inner join users_x_task_types as b
                  on (a.id = b.user_id)
                  inner join task_types as c
                  on (b.task_type_id = c.id)
                  where (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2)
                ) as b
                on (a.technician_id = b.technician_id)
                where a.task_state_id=2
                group by a.technician_id
                ORDER BY cantidad_iniciadas asc
                limit 1;"
          )
        );
      }
      //busca a un tecnico que tenga el mismo tipo de tarea (sin que importe la cantidad de tareas asignadas) que pertenezca al mismo lugar que el cliente aleatoriamente
      if(!$data){
        $data = DB::Select(
          DB::raw(
              "select b.technician_id as id, b.username, b.task_type
              from tasks as a
              inner join (
                select a.id as technician_id ,a.name as username, c.name as task_type
                from users as a
                inner join users_x_task_types as b
                on (a.id = b.user_id)
                inner join task_types as c
                on (b.task_type_id = c.id)
                where (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2)
              ) as b
              on (a.technician_id = b.technician_id)
              ORDER BY RAND()
              LIMIT 1;"
          )
        );
      }

      //busca al tecnico con menos tareas pendientes (sin que importe el tipo de tarea) que pertenezca al mismo lugar que el cliente

      //busca al tecnico con menos tareas iniciadas (sin que importe el tipo de tarea) que pertenezca al mismo lugar que el cliente

      //busca un tecnico que pertenezca al mismo lugar que el cliente aleatoriamente(sin que importe el tipo de tarea ni la cantidad de tareas)
      if(!$data){
        $data = DB::Select(
            DB::raw(
                "select id
                from users
                where place_id = $place_id && role_id=2
                ORDER BY RAND()
                LIMIT 1;"
            )
        );
      }

      if(!$data){
          return null;
      }

      $query = json_decode(json_encode($data[0]),true);
      $technician_id = $query['id'];
      return $technician_id;
    }
}
