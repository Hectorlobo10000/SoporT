<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Department;
class DepartmentController extends Controller
{

     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }
    public function index()
    {
        $departamentos = Department::paginate(20);
        return view('admin_menu.departments',compact('departamentos'));
    }

    public function create()
    {
        return view('admin_menu.add_department');
    }

    public function store(DepartmentStoreRequest $request)
    {
        $departamento = new Department(
            ['name'=>$request->input('name')
        ]);
        $departamento->save();

        return redirect()->route('departamentos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Department $departamento)
    {
        return view('admin_menu.edit_department',compact('departamento'));
    }

    public function update(DepartmentUpdateRequest $request,Department $departamento)
    {
        $departamento->name =$request->input('name');
        $departamento->save();
        return redirect()->route('departamentos.index');
    }

    public function destroy(Department $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
