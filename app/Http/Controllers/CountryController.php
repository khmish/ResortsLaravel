<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();

        return response(['data' => $countries ], 200);
    }

    public function store(CountryRequest $request)
    {
        $country = Country::create($request->all());

        return response(['data' => $country ], 201);

    }

    public function show($id)
    {
        $country = Country::findOrFail($id);

        return response(['data', $country ], 200);
    }

    public function update(CountryRequest $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update($request->all());

        return response(['data' => $country ], 200);
    }

    public function destroy($id)
    {
        Country::destroy($id);

        return response(['data' => null ], 204);
    }
}
