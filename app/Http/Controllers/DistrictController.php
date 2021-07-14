<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\City;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::latest()->get();

        return response(['data' => $districts ], 200);
    }
    public function districtsInCity($cityName)
    {
        $result = City::where("name",$cityName)->first();
        $districts = District::where("city_id",$result->id)->get();

        return response(['data' => $districts ], 200);
    }

    public function store(DistrictRequest $request)
    {
        $district = District::create($request->all());

        return response(['data' => $district ], 201);

    }

    public function show($id)
    {
        $district = District::findOrFail($id);

        return response(['data', $district ], 200);
    }

    public function update(DistrictRequest $request, $id)
    {
        $district = District::findOrFail($id);
        $district->update($request->all());

        return response(['data' => $district ], 200);
    }

    public function destroy($id)
    {
        District::destroy($id);

        return response(['data' => null ], 204);
    }
}
