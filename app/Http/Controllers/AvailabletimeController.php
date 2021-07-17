<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AvailabletimeRequest;
use App\Http\Resources\AvailabletimeCollection;
use App\Models\Availabletime;
use App\Models\Rent;

class AvailabletimeController extends Controller
{
    public function index(Request $request)
    {

        $availabletimes = Availabletime::
        // with(['district','resort'])->
        get();
        $c=collect($availabletimes)->pluck('id')->toArray();

        /// check the avaliable time is not rented yet
        $rents= Rent::whereIn('AvailableTime_id',$c)->orderBy('AvailableTime_id')->get();
        $rents=$rents->pluck('AvailableTime_id')->toArray();

        $availabletimes= $availabletimes->whereNotIn('id',$rents);
        

        if($request->has("availableDate"))
        {
            $availabletimes =$availabletimes->where("availableDate",">=",date($request->availableDate))->sortBy("availableDate", SORT_NATURAL);
        }
        if($request->has("dist"))
        {
            $availabletimes=$availabletimes
            ->where("resort.district.name",$request->dist);
            // return $availabletimes;
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
