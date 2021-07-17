<?php

namespace App\Http\Controllers;
use App\Http\Resources\RentCollection;
use Illuminate\Http\Request;

use App\Http\Requests\RentRequest;
use App\Models\Rent;
use App\Models\User;

class RentController extends Controller
{
    public function index(Request $request)
    {
        $rents = Rent::
            // where('rentedBy',$user->id)->
            latest()->
            get();
        if($request->has('user'))
        {
            $user= User::where("email",$request->user)->first();
            $rents =$rents->
            where('rentedBy',$user->id);

        }
        $rents =parent::paginate(RentCollection::collection($rents));
        return response( $rents , 200);
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
