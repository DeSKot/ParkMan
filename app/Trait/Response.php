<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseStatusCode;

trait Response
{
    protected function generateResponse($data, bool $status, int $code = ResponseStatusCode::HTTP_OK): JsonResponse
    {
        return response()->json(
            [
                'status' => $status,
                'data' => $data
            ],
            $code
        );
    }
}
