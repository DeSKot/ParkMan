<?php

namespace App\Repositories\Garage\Link;

use App\Repositories\FilterChain\Link\FilterQueryLink;
use Illuminate\Database\Eloquent\Builder;

class FilterByCountry extends FilterQueryLink
{
    public function handle(Builder $modelQueryBuilder, object $dto = null): Builder
    {
        if ($dto->getCountry() != null) {
            $builder = $modelQueryBuilder->where('country', $dto->getCountry());
            return parent::handle($builder, $dto);
        }
        return parent::handle($modelQueryBuilder, $dto);
    }
}
