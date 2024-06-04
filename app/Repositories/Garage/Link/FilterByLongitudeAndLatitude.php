<?php

namespace App\Repositories\Garage\Link;

use App\Repositories\FilterChain\Link\FilterQueryLink;
use Illuminate\Database\Eloquent\Builder;

class FilterByLongitudeAndLatitude extends FilterQueryLink
{
    public function handle(Builder $modelQueryBuilder, object $dto = null): Builder
    {
        if ($dto->getLongitude() != null and $dto->getLatitude() != null) {
            $builder = $modelQueryBuilder->where('longitude', '>=', (float)$dto->getLongitude())
                ->where('latitude', '>=', (float)$dto->getLatitude())
                ->orderBy('longitude');
            return parent::handle($builder, $dto);
        }
        return parent::handle($modelQueryBuilder, $dto);
    }
}

