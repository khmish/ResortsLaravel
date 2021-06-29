<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortRequest;
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
        $resort = Resort::create($request->all());

        return response(['data' => $resort ], 201);

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
        Resort::destroy($id);

        return response(['data' => null ], 204);
    }
}
