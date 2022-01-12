@extends('layouts.master')
@section('content')

<body class="animsition">
<div class="page-wrapper">
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content ">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-11 m-auto">
                                    <div class="card">
                                    <div class="card-header">Manage Employees</div>
                                    <div class="card-body card-block">
                                        <form action="@if($update==false){{ route('employees.store') }} @else 
                                        {{ route('employees.update',$employee->id) }} @endif " 
                                        method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="text" id="employee_first_name" name="first_name" 
                                                    placeholder="employee first name " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $employee->first_name }} @endif">
                                                </div>
                                                </div>

                                                <div class="form-group ">
                                                    <div class="input-group  ">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="employee_last_name" name="last_name" 
                                                        placeholder="employee last name " 
                                                        class="form-control"
                                                        value="@if ($update==true) {{ $employee->last_name }} @endif">
                                                    </div>
                                                    </div>
                                                <div class="form-group ">
                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="email" id="employee_email" name="email" 
                                                    placeholder=" employee Email " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $employee->email }} @endif">
                                                </div>
                                                </div>
                                                <div class="form-group ">
                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="text" id="employee_phone" name="phone" 
                                                    placeholder="Add Phone Number " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $employee->phone }} @endif">
                                                </div>
                                                </div>
                
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fas fa-caret-down"></i>
                                                        </div>
                                                        <select name="company_id" class="form-control" >
                                                            @if ($update == true)
                                                                <option value="{{ $employee->company->id }}"  selected>
                                                                  {{ $employee->company->name }} </option>
                                                                  @else
                                                                  <option value="">Select Company </option>
                                                            @endif
                                                                @foreach ($companies as $company  )                                   
                                                                <option value="{{ $company->id }}" >
                                                                  {{ $company->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> 
                                            
                                            <div 
                                             class="form-actions form-group d-flex justify-content-end">
                                                @if($update==false)
                                                <button type="submit" name="submit" 
                                                class="btn btn-primary btn-md "
                                                 style="background: #4272d7;" >Create New employee</button>
                                                @else
                                                <form method="post" action="{{route('employees.update',$employee->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                            @method('PUT')    
                                            <button style="background: #4272d7;" type="submit" name="submit" 
                                                class="btn btn-primary btn-md mr-1">Update Employee Information </button>
                                                                        
                                            </form>
                                                @endif
                                            </div>
                                   
                                        </form>
                                    </div>
                                </div>
                            </div>               
                        </div>
                                   
                            <div class="top-campaign col-11 m-auto" >
                                <h3 class="title-3 m-b-30">Companies</h3>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th> First Name</th>
                                                <th> Last Name</th>
                                                <th> Email</th>
                                                <th> Phone</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($employees as $employee )
                                            
                                      
                                <tr>
                                 <td> {{ $employee->id }}</td>
                                 <td> {{ $employee->first_name }} </td>
                                 <td> {{ $employee->last_name }} </td>
                                 <td> {{ $employee->email }} </td>
                                 <td> {{ $employee->phone }} </td>
                                                   
                              <td>
                                <div class="table-data-feature">
                                    <a href="{{ route('employees.edit', $employee->id) }}"> <button class="item btn btn-success"
                                         data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                    <form method="post" action="{{route('employees.destroy',$employee->id)}}" enctype="multipart/form-data">
                                        @csrf
                                @method('DELETE')                                
                                <button type="submit" class="item btn btn-danger" 
                                        data-toggle="tooltip" data-placement="top" title="Delete"> 
                                           <i class="zmdi zmdi-delete"></i></a> 
                                   </button>                           
                                </form>
                                </div>
                            </td>
                                                </tr>
                                         @endforeach    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>

@endsection