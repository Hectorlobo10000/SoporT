<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Department;
use App\User;
use App\Role;
use App\Place;
use App\UsersXTaskType;
use App\TaskType;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TaskType::all();
        $lugares = Place::all();
        $usuarios = User::paginate(20);

        $rol = User::where('role_id', 4)->get();
        $departamentos = Department::all();

        if ($rol->isEmpty()) {

            $roles = Role::all();

            return view('admin_menu.users',compact('roles','departamentos','usuarios','tipos','lugares'));
        }

        else
        {
            $roles = Role::find([1, 2, 3]);

            return view('admin_menu.users',compact('roles','departamentos','usuarios','tipos','lugares'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $places = explode(',', $request->input('lugares'));

        $idlugar = Place::where(['domain' => $places[0],
                               'municipality' => $places[1],
                               'address' => $places[2]])->get();

        $iddepto = Department::where('name', $request->input('dept'))->get();

        $idrol= Role::where('name', $request->input('roles'))->get();

        if ($idrol[0]->name == 2)
        {
            $usuario = new User(['department_id'=>$iddepto[0]->id,
                                 'role_id'=>$idrol[0]->id,
                                 'place_id'=>$idlugar[0]->id,
                                 'name'=>$request->input('name'),
                                 'email'=>$request->input('email'),
                                 'password'=>Hash::make($request->input('pass')),
                                 'phone'=>$request->input('phone')]);
            $usuario->save();

            $iduser = $usuario->id;

            $tipact = $request->input('tipoact');

            for ($i=0; $i < count($tipact) ; $i++) {
                $tp_x_us = new UsersXTaskType(['task_type_id'=>$tipact[$i],'user_id'=>$iduser]);
                $tp_x_us->save();
            }

        }

        else
        {
            $usuario = new User(['department_id'=>$iddepto[0]->id,
                                 'role_id'=>$idrol[0]->id,
                                 'place_id'=>$idlugar[0]->id,
                                 'name'=>$request->input('name'),
                                 'email'=>$request->input('email'),
                                 'password'=>Hash::make($request->input('pass')),
                                 'phone'=>$request->input('phone')]);
            $usuario->save();
            return redirect()->route('usuarios.index');
        }

         return redirect()->route('usuarios.index');
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
    public function edit($id)
    {
        $usuario=User::find($id);
        return view('admin_menu.edit_user',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
       $request->validate([ 'name'=>'required', 'phone'=>'required',
                            'email'=>'required', 'depto'=>'required',
                            'muni'=>'required', 'addres'=>'required'
                        ]);

        User::find($id)->update($request->except(['depto','muni','addres']));

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
