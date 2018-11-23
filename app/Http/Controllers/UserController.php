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

     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }
    public function index()
    {
        $usuarios = User::paginate(20);

        return view('admin_menu.users',compact('usuarios'));
    }

    public function create()
    {
        $tipos = TaskType::all();
        $lugares = Place::all();

        $rol = User::where('role_id', 4)->get();
        $departamentos = Department::all();

        if ($rol->isEmpty()) {

            $roles = Role::all();

            return view('admin_menu.add_user',compact('roles','departamentos','tipos','lugares'));
        }
        else
        {
            $roles = Role::find([1, 2, 3]);

          return view('admin_menu.add_user',compact('roles','departamentos','tipos','lugares'));
        }
    }

    public function store(UserStoreRequest $request)
    {
        $role_id= $request->input('role_id');
        if ($role_id == 2)
        {
            $user = new User(['department_id'=>$request->input('department_id'),
                                 'role_id'=>$role_id,
                                 'place_id'=>$request->input('place_id'),
                                 'name'=>$request->input('name'),
                                 'email'=>$request->input('email'),
                                 'password'=>Hash::make($request->input('pass')),
                                 'phone'=>$request->input('phone')]);
            $user->save();

            $user_id = $user->id;

            $tipact = $request->input('tipoact');

            for ($i=0; $i < count($tipact) ; $i++) {
                $tp_x_us = new UsersXTaskType(['task_type_id'=>$tipact[$i],'user_id'=>$user_id]);
                $tp_x_us->save();
            }

            return redirect()->route('usuarios.index');
        }

        else
        {
            $user = new User(['department_id'=>$request->input('department_id'),
                                 'role_id'=>$role_id,
                                 'place_id'=>$request->input('place_id'),
                                 'name'=>$request->input('name'),
                                 'email'=>$request->input('email'),
                                 'password'=>Hash::make($request->input('pass')),
                                 'phone'=>$request->input('phone')]);
            $user->save();
            return redirect()->route('usuarios.index');
        }
    }

    public function edit($id)
    {
        $usuario=User::find($id);
        return view('admin_menu.edit_user',compact('usuario'));
    }

    public function editProfile($id)
    {
        $usuario=User::find($id);
        return view('edit_profile',compact('usuario'));
    }

    public function show($id)
    {
        $usuario=User::find($id);
        return view('show_profile',compact('usuario','lugares'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        User::find($id)->update($request->except(['depto','muni','addres']));

        return redirect()->route('usuarios.index');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
