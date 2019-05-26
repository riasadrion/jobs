<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        
        $uid = auth()->user()->id;

        $company = Company::where('user_id', '=', $uid)->first();

        return view('dashboard.company')->with('company', $company);
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
    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required|min:3',
            'logo' => 'image|nullable|max:200'
        ]);
    
        if($request->hasFile('logo')){

            //Get filename with the extension
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();

            //Get just extension
            $extension = $request->file('logo')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = time().'.'.$extension;

            //Upload
            $path = $request->file('logo')->storeAs('public/company_logos', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $company = new Company;

        $company->name = request('name');
        $company->tagline = request('tagline');
        $company->address = request('address');
        $company->web = request('web');
        $company->user_id = auth()->user()->id;
        $company->logo = $fileNameToStore;


        $company->save();

        return redirect('/companies')->with('success', 'Company saved !');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
