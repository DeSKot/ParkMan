<?php

namespace App\Services\Garage;

use App\DTO\Garage\Filter;
use App\DTO\Paginate;
use App\Exceptions\Garage\NotFoundException;
use App\Http\Resources\GarageResource;
use App\Repositories\FilterChain\FilterChainRepositoryProviderInterface as FilterRepoProvider;
use App\Trait\Pagination;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class Handler implements GarageInterface
{
    use Pagination;

    public function __construct(
        private FilterRepoProvider $filterProvider
    ) {
    }

    public function displayInfo(Filter $filterDto, Paginate $paginateDto): AnonymousResourceCollection
    {
        $collection = $this->filterProvider->selectChain(
            FilterRepoProvider::GARAGE_FILTER_CHAIN_KEY,
            $filterDto
        )->execute();

        if (!$collection->count()) {
            throw new NotFoundException('Not found Garage data by your filter query request');
        }

        return GarageResource::collection(
            $this->paginate(
                $this->filterProvider->selectChain(FilterRepoProvider::GARAGE_FILTER_CHAIN_KEY, $filterDto)->execute(),
                $paginateDto
            )
        );
    }
}
