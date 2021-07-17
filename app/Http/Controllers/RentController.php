<?php

namespace App\Http\Controllers;
use App\Http\Resources\RentCollection;

use App\Http\Requests\RentRequest;
use App\Models\Rent;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::latest()->get();
        $rents =parent::paginate(RentCollection::collection($rents));
        return response(['data' => $rents ], 200);
    }

    public function store(RentRequest $request)
    {
        $rent = Rent::create($request->all());

        return response(['data' => $rent ], 201);

    }

    public function show($id)
    {
        $rent = Rent::findOrFail($id);

        return response(['data'=> $rent ], 200);
    }

    public function update(RentRequest $request, $id)
    {
        $rent = Rent::findOrFail($id);
        $rent->update($request->all());

        return response(['data' => $rent ], 200);
    }

    public function destroy($id)
    {
        Rent::destroy($id);

        return response(['data' => null ], 204);
    }
}
