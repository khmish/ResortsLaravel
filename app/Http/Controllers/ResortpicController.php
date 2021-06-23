<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResortpicRequest;
use App\Models\Resortpic;

class ResortpicController extends Controller
{
    public function index()
    {
        $resortpics = Resortpic::latest()->get();

        return response(['data' => $resortpics ], 200);
    }

    public function store(ResortpicRequest $request)
    {
        $resortpic = Resortpic::create($request->all());

        return response(['data' => $resortpic ], 201);

    }

    public function show($id)
    {
        $resortpic = Resortpic::findOrFail($id);

        return response(['data', $resortpic ], 200);
    }

    public function update(ResortpicRequest $request, $id)
    {
        $resortpic = Resortpic::findOrFail($id);
        $resortpic->update($request->all());

        return response(['data' => $resortpic ], 200);
    }

    public function destroy($id)
    {
        Resortpic::destroy($id);

        return response(['data' => null ], 204);
    }
}
