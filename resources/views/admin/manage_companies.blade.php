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
                            <div class="col-lg-10 m-auto">
                                    <div class="card">
                                    <div class="card-header">Manage Companies</div>
                                    <div class="card-body card-block">
                                        <form action="@if($update==false){{ route('companies.store') }} @else 
                                        {{ route('companies.update',$company->id) }} @endif " 
                                        method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="text" id="company_name" name="name" 
                                                    placeholder="Company Name " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $company->name }} @endif">
                                                </div>
                                                </div>

                                                <div class="form-group ">
                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="email" id="company_email" name="email" 
                                                    placeholder=" Company Email " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $company->email }} @endif">
                                                </div>
                                                </div>

                                                <div class="input-group  ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="file" id="company_logo" name="logo" 
                                                    placeholder="New Categorie " 
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $company->logo }} @endif">
                                                </div>

                                                   <div class="input-group mt-3 ">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-plus"></i>
                                                    </div>
                                                    <input type="text" id="company_website"
                                                     name="website" placeholder="Company Website"
                                                    class="form-control"
                                                    value="@if ($update==true) {{ $company->website }} @endif">
                                                    
                                                </div>
                                            </div>
                                            <div 
                                             class="form-actions form-group d-flex justify-content-end">
                                                @if($update==false)
                                                <button type="submit" name="submit" 
                                                class="btn btn-primary btn-md mr-3"
                                                 style="background: #4272d7; " >Create New Company</button>
                                                @else

                                                <form method="post" action="{{route('companies.update',$company->id)}}" 
                                                    enctype="multipart/form-data">
                                                    @csrf
                                            @method('PUT')    
                                            <button style="background: #4272d7; " type="submit" name="submit" 
                                                class="btn btn-primary btn-md mr-3">Update Company</button>
                                                                        
                                            </form>
                                               
                                                @endif
                                            </div>
                                   
                                        </form>
                                    </div>
                                </div>
                            </div>               
                        </div>
                                   
                            <div class="top-campaign col-10 m-auto">
                                <h3 class="title-3 m-b-30">Companies</h3>
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Company Logo</th>
                                                <th>Company Name</th>
                                                <th>Company Email</th>
                                                <th>Company Website</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($companies as $company )
                                            
                                      
                                <tr>
                                 <td> {{ $company->id }}</td>
                                 <td><img src= " {{asset($company->logo ) }}" alt="company_image" width="50px"></td>
                                 <td> {{ $company->name }} </td>
                                 <td> {{ $company->email }} </td>
                                 <td> {{ $company->website }} </td>
                                                   
                              <td>
                                <div class="table-data-feature">
                                    <a href="{{ route('companies.edit', $company->id) }}"> <button class="item btn btn-success"
                                         data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                    <form method="post" action="{{route('companies.destroy',$company->id)}}" enctype="multipart/form-data">
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

@endsection