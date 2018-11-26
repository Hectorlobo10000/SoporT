<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdateProfileRequest;
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
        $users = User::paginate(20);

        return view('admin_menu.users',compact('users'));
    }

    public function create()
    {
        $task_types = TaskType::all();
        $places = Place::all();

        $role = User::where('role_id', 4)->get();
        $departments = Department::all();

        if ($role->isEmpty()) {

            $roles = Role::all();

            return view('admin_menu.add_user',compact('roles','departments','task_types','places'));
        }
        else
        {
            $roles = Role::find([1, 2, 3]);

          return view('admin_menu.add_user',compact('roles','departments','task_types','places'));
        }
    }

    public function store(UserStoreRequest $request)
    {
        $role_id= $request->input('role_id');
        $email = $request->input('email');
        $user_deleted = User::onlyTrashed()->where('email',$email)->first();
        if($user_deleted == NULL){
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

                $task_types = $request->input('task_types');

                for ($i=0; $i < count($task_types) ; $i++) {
                    $user_x_task_type = new UsersXTaskType(['task_type_id'=>$task_types[$i],'user_id'=>$user_id]);
                    $user_x_task_type->save();
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
        }else{
            $user_deleted->restore();
            return redirect()->route('usuarios.index');
        }

    }

    public function edit($id)
    {
        $user=User::find($id);
        $task_types = TaskType::all();
        $places = Place::all();

        $role = User::where('role_id', 4)->get();
        $departments = Department::all();

        if ($role->isEmpty() || $user->role_id == 4) {
            $roles = Role::all();
            return view('admin_menu.edit_user',compact('user','task_types','places','roles','departments'));
        }else{
            $roles = Role::find([1, 2, 3]);
            return view('admin_menu.edit_user',compact('user','task_types','places','roles','departments'));
        }
    }

    public function editProfile($id)
    {
        $user=User::find($id);
        return view('edit_profile',compact('user'));
    }

    public function show($id)
    {
        $user=User::find($id);
        return view('show_profile',compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        User::find($id)->update($request->except(['']));
        return redirect()->route('usuarios.index');
    }

    public function updateProfile(UserUpdateProfileRequest $request, $id)
    {
        $user=User::find($id);
        $user->update($request->except(['']));
        return redirect()->route('show.profile',compact('user'));
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}
