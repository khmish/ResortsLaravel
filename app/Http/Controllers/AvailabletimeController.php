<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvailabletimeRequest;
use App\Models\Availabletime;

class AvailabletimeController extends Controller
{
    public function index()
    {
        $availabletimes = Availabletime::latest()->get();

        return response(['data' => $availabletimes ], 200);
    }

    public function store(AvailabletimeRequest $request)
    {
        $availabletime = Availabletime::create($request->all());

        return response(['data' => $availabletime ], 201);

    }

    public function show($id)
    {
        $availabletime = Availabletime::findOrFail($id);

        return response(['data', $availabletime ], 200);
    }

    public function update(AvailabletimeRequest $request, $id)
    {
        $availabletime = Availabletime::findOrFail($id);
        $availabletime->update($request->all());

        return response(['data' => $availabletime ], 200);
    }

    public function destroy($id)
    {
        Availabletime::destroy($id);

        return response(['data' => null ], 204);
    }
}
