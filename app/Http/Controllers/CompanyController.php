<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::paginate(10);
        $update=false;
        return view('admin.manage_companies',compact('companies','update'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_companies');
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
           
            'name'=> 'required',
            'email'=> '',
            'website'=> '',
            'logo'=>'file|dimensions:min_width=100,min_height=100',
           
        ]);
        if (request('logo')) {
            $input['logo']= request('logo')->store('images');
        }
        Company::create($input);
        session()->flash('Company_create_massage','Company was created');
        return back();

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $compan,$id)
    {
        $company = Company::find($id);
        $companies=Company::paginate(10);
        $update=true;
        return view('admin.manage_companies',compact('company','update','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $input= $request->validate([
           
            'name'=> 'required',
            'email'=> '',
            'website'=> '',
            'logo'=>'file|dimensions:min_width=100,min_height=100',
           
        ]);
        if (request('logo')) {
            $input['logo']= request('logo')->store('images');
        }
        $company->update($input);
        session()->flash('Company_create_massage','Company was created');
        return  redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::find($id);
        $company->delete();
        return back();
    }
}
