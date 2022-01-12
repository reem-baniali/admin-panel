<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Pagination\Paginator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::paginate(10);
        $companies= Company::all();
        $update=false;
       return view('admin.manage_employees',compact('employees','update','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_employees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->validate([
           
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> '',
            'phone'=> '',
            'company_id'=> 'required',
           
        ]);
     
        Employee::create($input);
        session()->flash('Company_create_massage','Company was created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id); 
        $companies= Company::all();
        $employees= Employee::paginate(10);

        $update=true;

        return view('admin.manage_employees',compact('employee','employees','update','companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $input= $request->validate([
           
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> '',
            'phone'=> '',
            'company_id'=> 'required',
           
        ]);
     
        $employee->update($input);
        session()->flash('Company_create_massage','Company was created');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return back();
    }
}
