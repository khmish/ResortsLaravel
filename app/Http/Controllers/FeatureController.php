<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureRequest;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();

        return response(['data' => $features ], 200);
    }

    public function store(FeatureRequest $request)
    {
        $feature = Feature::create($request->all());

        return response(['data' => $feature ], 201);

    }

    public function show($id)
    {
        $feature = Feature::findOrFail($id);

        return response(['data', $feature ], 200);
    }

    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::findOrFail($id);
        $feature->update($request->all());

        return response(['data' => $feature ], 200);
    }

    public function destroy($id)
    {
        Feature::destroy($id);

        return response(['data' => null ], 204);
    }
}
