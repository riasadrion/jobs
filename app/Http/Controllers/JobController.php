<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Location;
use App\Type;
use Illuminate\Http\Request;

class JobController extends Controller
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
        $jobs = Job::all();
        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $locations = Location::all();
        $types = Type::all();
        return view('jobs.create', compact('categories','locations', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Job();

        $job->title = request('title');
        $job->description = request('description');
        $job->custom_url = request('custom_url');
        $job->deadline = request('deadline');
        $job->employer_id = request('employer_id');
        $job->category_id = request('category_id');
        $job->type_id = request('type_id');
        $job->city_id = request('city_id');



        $job->save();

        return redirect("/jobs/create")->with('success','Job created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }



    //  type operations  ---------------------------------------------------------------------
        
        public function typeindex(){

            $types = Type::orderBy('id', 'desc')->paginate(5);

            return view ('Jobs.types', compact('types'));
        }


        public function typestore(Request $request)
        {
            $type = new type();

            $type->name = $request->input('name');

            $type->save();

            return redirect("/types")->with('success','type created successfully!');
        }     


        public function typeupdate(Request $request, type $type)
        {

            $type->name = $request->input('name');

            $type->save();

            return back();
        }

        
        public function typedestroy(type $type)
        {
            $type->delete();

            return back();
        }

        //  type operations  ---------------------------------------------------------------------
}
