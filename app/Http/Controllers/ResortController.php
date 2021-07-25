<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortRequest;
use App\Models\District;
use App\Models\Resort;
use App\Http\Resources\ResortCollection;
use Illuminate\Http\Request;

class ResortController extends Controller
{
    public function index(Request $request)
    {
        $resorts = Resort::latest();
        if($request->has('user')){
            
            $resorts = $resorts->where('createdBy',$request->user);
        }


        return response(['data' => $resorts->get() ], 200);
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $resort = new Resort;
        $resort->name =$request->name;
        $resort->createdBy =$request->createdBy;
        $resort->description =$request->description;
        $dist_id=District::where("name","=",$request->district_id)->first()->id;
        $resort->district_id =$dist_id;
        // return $resort;
        if($resort->save()){

            return response(['data' => $resort ], 201);
        }
        return response(['error' => "something went wrong" ], 400);

    }

    public function show($id)
    {
        $resort = Resort::findOrFail($id);

        // return $resort;
        $resort =new ResortCollection($resort);
        // return $resort->district->city->country;
        return response(['data' => $resort ], 200);
    }

    public function update(ResortRequest $request, $id)
    {
        $resort = Resort::findOrFail($id);
        $resort->name =$request->name;
        $resort->createdBy =$request->createdBy;
        $resort->description =$request->description;
        $dist_id=District::where("name","=",$request->district_id)->first()->id;
        $resort->district_id =$dist_id;
        if($resort->save()){

            return response(['data' => $resort ], 200);
        }

        return response(['data' => "something went wrong!" ], 400);
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
