<?php

namespace App\Http\Controllers;

use App\Location;
use App\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $locations = Location::orderBy('id', 'desc')->paginate(5);
       $cities = City::orderBy('id', 'desc')->paginate(5);
       return view('location.index', compact('locations', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loc = new Location();

        $loc->name = request('name');

        $loc->save();

        return redirect("/locations")->with('success','State created successfully!');
    }


    public function citystore(Request $request)
    {
        $city = new City();

        $city->location_id = request('loc_id');
        $city->name = request('name');

        $city->save();

        return redirect("/locations")->with('success','City created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->name = $request->input('name');

        $location->save();

        return back();
    }   

     public function cityupdate(Request $request, City $city)
    {

        $city->name = $request->input('name');

        $city->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return back();
    }

    public function citydestroy(City $city)
    {
        $city->delete();

        return back();
    }
}
