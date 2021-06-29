<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->get();

        return response(['data' => $cities ], 200);
    }

    public function store(CityRequest $request)
    {
        $city = City::create($request->all());

        return response(['data' => $city ], 201);

    }

    public function show($id)
    {
        $city = City::findOrFail($id);

        return response(['data', $city ], 200);
    }

    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());

        return response(['data' => $city ], 200);
    }

    public function destroy($id)
    {
        City::destroy($id);

        return response(['data' => null ], 204);
    }
}
