<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelName;


class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = ModelName::all();
        // $service = ModelName::query()->orderByDesc('id')->paginate(5);
        return response()->json($service);
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
        // $service = Service::create($request->all());
        // return response()->json($service);
        $service = new ModelName;
        $service->firstName=$request->input('firstName');
        $service->lastName=$request->input('lastName');
        $service->img=$request->file('img')->store('model');
        $service->save();
        // return $service;
        // dd($service->img);
        return response()->json($service);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=ModelName::findOrFail($id);
        return response()->json($service);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $service = ModelName::find($id);
        $service->firstName=$request->input('firstName');
        $service->lastName=$request->input('lastName');
        // $service->img=$request->file('img')->store('model');
       if($request->file('img')){
            $service->img=$request->file('img')->store('model');
        }
        $service->save();
        return $service;
        // return response()->json($service);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=ModelName::where('id',$id)->delete();
        return response()->json($service);
    }
}
