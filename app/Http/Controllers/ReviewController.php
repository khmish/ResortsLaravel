<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return response(['data' => $reviews ], 200);
    }

    public function store(ReviewRequest $request)
    {
        $review = Review::create($request->all());

        return response(['data' => $review ], 201);

    }

    public function show($id)
    {
        $review = Review::findOrFail($id);

        return response(['data', $review ], 200);
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());

        return response(['data' => $review ], 200);
    }

    public function destroy($id)
    {
        Review::destroy($id);

        return response(['data' => null ], 204);
    }
}
