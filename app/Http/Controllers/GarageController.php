<?php

namespace App\Http\Controllers;

use App\Http\Requests\Garage\FilterRequest;
use App\Services\Garage\GarageInterface;
use App\Trait\Response;
use Illuminate\Http\JsonResponse;

class GarageController extends Controller
{
    use Response;

    public function __construct(private GarageInterface $garageService)
    {
    }

    public function show(FilterRequest $request): JsonResponse
    {
        return $this->generateResponse([
            'garages' => $this->garageService->displayInfo($request->getDto(), $request->getPaginationDto())
        ], true);
    }
}
