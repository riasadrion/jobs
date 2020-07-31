<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use App\Location;
use App\Type;
use Illuminate\Http\Request;

class JobsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->paginate(6);
        return view('jobs.index')->with('jobs', $jobs);
    }


    public function create()
    {   
        $categories = Category::all();
        $locations = Location::all();
        $types = Type::all();
        return view('jobs.create', compact('categories','locations', 'types'));
    }

    public function store(Request $request)
    {
        $job = new Job();

        $job->title = request('title');
        $job->description = request('description');
        $job->salary = request('salary');
        $job->map = request('map');
        $job->custom_url = request('custom_url');
        $job->deadline = request('deadline');
        $job->user_id = auth()->user()->id;
        $job->category_id = request('category_id');
        $job->type_id = request('type_id');
        $job->city_id = request('city_id');

        $job->save();

        return redirect("/jobs/create")->with('success','Job created successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.details', compact('job'));
    }

    public function edit(Job $job)
    {
        //
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        //
    }

}
