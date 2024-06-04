<?php

namespace App\Services\Garage;

use App\DTO\Garage\Filter;
use App\DTO\Paginate;
use App\Exceptions\Garage\NotFoundException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface GarageInterface
{
    /**
     * @throws NotFoundException
     */
    public function displayInfo(Filter $filterDto, Paginate $paginateDto): AnonymousResourceCollection;
}
