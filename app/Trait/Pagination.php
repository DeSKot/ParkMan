<?php

namespace App\Trait;

use App\DTO\Paginate;
use Illuminate\Database\Eloquent\Collection;

trait Pagination
{
    public function paginate(Collection $collection, Paginate $paginateDto): Collection
    {
        return $collection->sortBy($paginateDto->getOrderByRow(), SORT_REGULAR, $paginateDto->getDirection() == 'desc')
            ->slice(
                $paginateDto->getPage() == 1 ?
                    0 :
                    $paginateDto->getPage() * $paginateDto->getPerPage(),
                $paginateDto->getPerPage()
            );
    }
}
