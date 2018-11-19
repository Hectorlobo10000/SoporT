<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceUpdateRequest;
use App\Http\Requests\PlaceStoreRequest;
use App\Place;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        date_default_timezone_set('US/Central');
    }
    public function index()
    {
        $lugares = Place::paginate(20);
        return view('admin_menu.places',compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_menu.add_place');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceStoreRequest $request)
    {

        $lugar = new Place([
            'domain'=>$request->input('domain'),
            'municipality'=>$request->input('municipality'),
            'address'=>$request->input('address')
        ]);
        $lugar->save();

        return redirect()->route('lugares.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $lugare)
    {
        return view('admin_menu.edit_place',compact('lugare'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceUpdateRequest $request, Place $lugare)
    {
        $lugare->domain = $request->input('domain');
        $lugare->municipality = $request->input('municipality');
        $lugare->address = $request->input('address');
        $lugare->save();
        return redirect()->route('lugares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $lugare)
    {
        $lugare->delete();
        return redirect()->route('lugares.index');
    }
}
