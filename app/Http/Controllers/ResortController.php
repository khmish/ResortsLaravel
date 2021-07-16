<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortRequest;
use App\Models\District;
use App\Models\Resort;

class ResortController extends Controller
{
    public function index()
    {
        $resorts = Resort::latest()->get();

        return response(['data' => $resorts ], 200);
    }

    public function store(ResortRequest $request)
    {
        // dd($request->all());
        $resort = new Resort;
        $resort->name =$request->name;
        $resort->description =$request->description;
        $dist_id=District::where("name",$request->district_id)->first()->id;
        $resort->district_id =$dist_id;
        if($resort->save()){

            return response(['data' => $resort ], 201);
        }
        return response(['error' => "something went wrong" ], 400);

    }

    public function show($id)
    {
        $resort = Resort::findOrFail($id);

        // return $resort->district->city->country;
        return response(['data', $resort ], 200);
    }

    public function update(ResortRequest $request, $id)
    {
        $resort = Resort::findOrFail($id);
        $resort->update($request->all());

        return response(['data' => $resort ], 200);
    }

    public function destroy($id)
    {
        $resort = Resort::findOrFail($id);
        if($resort->delete())
        {

            return response(['data' => null ], 204);
        }
        return response(['error' => "something went wrong" ], 400);

    }
}
