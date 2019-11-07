<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
         $fullName = $request->file('logo')->getClientOriginalName();

         //getting only the name without extension
         $name = explode('.', $fullName)[0];

         //Get just extension
         $extension = $request->file('logo')->getClientOriginalExtension();

            //file name to store
            $fileNameToStore = $name.'_'.time().'.'.$extension;

            //Upload
            $path = $request->file('logo')->storeAs('public/company_logos', $fileNameToStore);

        }else{

            $fileNameToStore = 'noimage.png';
        }

        $company = new Company;

        $company->name = request('name');
        $company->tagline = request('tagline');
        $company->address = request('address');
        $company->web = request('web');
        $company->user_id = auth()->user()->id;
        $company->logo = $fileNameToStore;

        
       
       // Employer cannot add more than one company. 
       $uid = auth()->user()->id;
       $checkifexists = Company::where('user_id', '=', $uid)->first();

        if(!empty($checkifexists)){
         
         return redirect('/companies')->with('warning', 'Access Denied !');

        }else{

        $company->save();
        return redirect('/companies')->with('success', 'Company saved !');
        
        }



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
      
        

        $request->validate([
            'name' => 'required|min:3',
            'logo' => 'image|nullable|max:200'
        ]);

        
         if($request->hasFile('logo')){

        //Deleting Old image
        if($company->logo != 'noimage.png'){
            Storage::delete('public/company_logos/'.$company->logo);
        }

         //Get filename with the extension
         $fullName = $request->file('logo')->getClientOriginalName();

         //getting only the name without extension
         $name = explode('.', $fullName)[0];

         //Get just extension
         $extension = $request->file('logo')->getClientOriginalExtension();

         //file name to store
         $fileNameToStore = $name.'_'.time().'.'.$extension;

         //Upload
         $path = $request->file('logo')->storeAs('public/company_logos', $fileNameToStore);



      }


        $company->name = request('name');
        $company->tagline = request('tagline');
        $company->address = request('address');
        $company->web = request('web');
        $company->user_id = auth()->user()->id;

        if($request->hasFile('logo')){



        $company->logo = $fileNameToStore;

        }
        
        $company->save();

        return redirect('/companies')->with('success', 'Company Profile Updated !');

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
