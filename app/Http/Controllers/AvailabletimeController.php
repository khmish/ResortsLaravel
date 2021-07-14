<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AvailabletimeRequest;
use App\Http\Resources\AvailabletimeCollection;
use App\Models\Availabletime;

class AvailabletimeController extends Controller
{
    public function index(Request $request)
    {

        $availabletimes = Availabletime::
        with(['district','resort'])->get();

        if($request->has("availableDate"))
        {
            $availabletimes =$availabletimes->where("availableDate",">",date($request->availableDate))->sortBy("availableDate");

        }
        if($request->has("dist"))
        {
            $availabletimes=$availabletimes
            ->where("district.name","like",$request->dist);
        }

        $availabletimes = AvailabletimeCollection::collection($availabletimes);
        $availabletimes =parent::paginate($availabletimes,$perPage = $request->itemsPerPage ,$page = $request->page);
        
        return response($availabletimes , 200);
    }

    public function store(AvailabletimeRequest $request)
    {
        $availabletime = Availabletime::create($request->all());

        return response(['data' => $availabletime ], 201);

    }

    public function show($id)
    {
        $availabletime = Availabletime::findOrFail($id);

        $availabletime = new AvailabletimeCollection($availabletime);
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
