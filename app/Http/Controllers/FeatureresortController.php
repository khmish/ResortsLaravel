<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeatureresortRequest;
use App\Models\Featureresort;

class FeatureresortController extends Controller
{
    public function index()
    {
        $featureresorts = Featureresort::latest()->get();

        return response(['data' => $featureresorts ], 200);
    }

    public function store(FeatureresortRequest $request)
    {
        $featureresort = Featureresort::create($request->all());

        return response(['data' => $featureresort ], 201);

    }

    public function show($id)
    {
        $featureresort = Featureresort::findOrFail($id);

        return response(['data', $featureresort ], 200);
    }

    public function update(FeatureresortRequest $request, $id)
    {
        $featureresort = Featureresort::findOrFail($id);
        $featureresort->update($request->all());

        return response(['data' => $featureresort ], 200);
    }

    public function destroy($id)
    {
        Featureresort::destroy($id);

        return response(['data' => null ], 204);
    }
}
