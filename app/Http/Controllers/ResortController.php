<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resort;

class ResortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $allResorts = Resort::all();
        return parent::getPaginatedResopnse("", $allResorts, $perPage = $request->itemsPerPage);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $createResort = $request->validate([
            'name' => 'required|max:99',
            'description' => 'nullable|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'media' => 'required',
        ]);
        $createResort = Resort::create($createResort);
        return parent::getResponse("created", 200, $createResort);
    }

    public function show($id)
    {

        $updatedResort = Resort::where('id', $id)->first();
        return parent::getResponse("updated", 200, $updatedResort);
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
        $updatedResort = $request->validate([
            'id' => 'required',
            'name' => 'required|max:99',
            'description' => 'nullable|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'media' => 'required',
        ]);
        $updatedResort = Resort::where('id', $id)->update($updatedResort);
        return parent::getResponse("updated", 200, $updatedResort);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleteResort = Resort::find($id);
        if ($deleteResort->delete()) {
            return parent::getResponse("deleted", 200, $deleteResort);
        }
        return parent::getResponse("couldnt be deleted", 200, $deleteResort);
        
    }
}
