<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortsettingRequest;
use App\Models\Resortsetting;

class ResortsettingController extends Controller
{
    public function index()
    {
        $resortsettings = Resortsetting::latest()->get();

        return response(['data' => $resortsettings ], 200);
    }

    public function store(ResortsettingRequest $request)
    {
        $resortsetting = Resortsetting::create($request->all());

        return response(['data' => $resortsetting ], 201);

    }

    public function show($id)
    {
        $resortsetting = Resortsetting::findOrFail($id);

        return response(['data', $resortsetting ], 200);
    }

    public function update(ResortsettingRequest $request, $id)
    {
        $resortsetting = Resortsetting::findOrFail($id);
        $resortsetting->update($request->all());

        return response(['data' => $resortsetting ], 200);
    }

    public function destroy($id)
    {
        Resortsetting::destroy($id);

        return response(['data' => null ], 204);
    }
}
