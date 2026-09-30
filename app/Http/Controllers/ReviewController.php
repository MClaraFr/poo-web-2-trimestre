<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::paginate();
    }

    public function store(ReviewStoreRequest $request)
    {
        $data = $request->validated();
        $review = Review::create($data);

        return $review;
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function update(Review $review, ReviewStoreRequest $request)
    {
        $data = $request->validated();
        $review->update($data);

        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return response()->json([
            'message' => 'Avaliação excluída',
        ], 200);
    }
}