<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0",
 *         title="Todo List Api Version 1",
 *         description="Demo Todo List Api Version 1",
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function respondSuccess($name, $data, $id)
    {
        return response()->json([
            'data' => [
                'type' => $name,
                'id' => (string)$id,
                'attributes' => $data
            ]
        ], 200);
    }
}
