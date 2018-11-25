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

    public function create()
    {
      $task_types = TaskType::all();
      return view('client_menu.add_task',compact('task_types'));
    }

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

    public function showDescription(Task $task)
    {
      return view('show_task_description',compact('task'));
    }
    public function editDescription(Task $task){
      return view('client_menu/edit_task_description',compact('task'));
    }
     public function updateDescription(Request $request,Task $task){
      $request->validate([
        'description'=>'required'
      ],[
        'description.required' => 'La descripción es obligatoria'
      ]);
      $task->update($request->all());
      return redirect()->route('show.description', $task->id);
    }
    public function edit(Task $task)
    {
        $task_types = TaskType::all();
        return view('client_menu.edit_task',compact('task','task_types'));
    }

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

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    private function getTechnicianId(int $task_type_id, int $place_id){
     //busca el tecnico con menos tareas pendientes que tenga el mismo tipo de actividad de la tarea y que pertenezca al mismo lugar que el cliente
      $data = DB::Select(
        DB::raw(
            "
            SELECT b.technician_id AS id,
                   b.username,
                   b.task_type,
                   count(a.task_state_id) AS cantidad_pendientes
            FROM tasks AS a
            INNER JOIN
              ( SELECT a.id AS technician_id ,
                       a.name AS username,
                       c.name AS task_type
               FROM users AS a
               INNER JOIN users_x_task_types AS b ON (a.id = b.user_id)
               INNER JOIN task_types AS c ON (b.task_type_id = c.id)
               WHERE (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2) ) AS b ON (a.technician_id = b.technician_id)
            WHERE a.task_state_id=1
            GROUP BY a.technician_id
            ORDER BY cantidad_pendientes ASC LIMIT 1;
            "
        )
      );
      //busca el tecnico con menos tareas iniciadas que tenga el mismo tipo de actividad de la tarea y que pertenezca al mismo lugar que el cliente
      if (!$data){
        $data = DB::Select(
            DB::raw(
                "
                SELECT b.technician_id AS id,
                       b.username,
                       b.task_type,
                       count(a.task_state_id) AS cantidad_iniciadas
                FROM tasks AS a
                INNER JOIN
                  ( SELECT a.id AS technician_id ,
                           a.name AS username,
                           c.name AS task_type
                   FROM users AS a
                   INNER JOIN users_x_task_types AS b ON (a.id = b.user_id)
                   INNER JOIN task_types AS c ON (b.task_type_id = c.id)
                   WHERE (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2) ) AS b ON (a.technician_id = b.technician_id)
                WHERE a.task_state_id=2
                GROUP BY a.technician_id
                ORDER BY cantidad_iniciadas ASC LIMIT 1;"
        )
        );
      }
      //busca a un tecnico que tenga el mismo tipo de tarea (sin que importe la cantidad de tareas asignadas) que pertenezca al mismo lugar que el cliente aleatoriamente
      if(!$data){
        $data = DB::Select(
          DB::raw(
              "
              SELECT b.technician_id AS id,
                     b.username,
                     b.task_type
              FROM tasks AS a
              INNER JOIN
                ( SELECT a.id AS technician_id ,
                         a.name AS username,
                         c.name AS task_type
                 FROM users AS a
                 INNER JOIN users_x_task_types AS b ON (a.id = b.user_id)
                 INNER JOIN task_types AS c ON (b.task_type_id = c.id)
                 WHERE (c.id= $task_type_id && a.place_id=$place_id && a.role_id=2) ) AS b ON (a.technician_id = b.technician_id)
              ORDER BY RAND() LIMIT 1;
              "
          )
        );
      }

      //busca al tecnico con menos tareas pendientes (sin que importe el tipo de tarea) que pertenezca al mismo lugar que el cliente

      //busca al tecnico con menos tareas iniciadas (sin que importe el tipo de tarea) que pertenezca al mismo lugar que el cliente

      //busca un tecnico que pertenezca al mismo lugar que el cliente aleatoriamente(sin que importe el tipo de tarea ni la cantidad de tareas)
      if(!$data){
        $data = DB::Select(
            DB::raw(
                "
                SELECT id
                FROM users
                WHERE place_id = $place_id && role_id=2
                ORDER BY RAND() LIMIT 1;
                "
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
?>