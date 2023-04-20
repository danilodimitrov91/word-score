<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\WordScoreRequest;
use App\Services\WordScore\WordScoreService;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0",
 *         title="Todo List Api Version 1",
 *         description="Demo Todo List Api Version 1",
 *     )
 * )
 */
class WordScoreController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/score",
     *      @OA\Parameter(
     *         name="word",
     *         in="query",
     *         description="Word",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *          )
     *      )
     * )
     */
    public function getScore(WordScoreRequest $request, WordScoreService $wordScoreService)
    {
        //call service that will take care of business logic
        $score = $wordScoreService->getScore($request);

        return response()->json($score);
    }
}
