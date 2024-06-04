<?php

namespace App\Repositories\Garage\Link;

use App\Repositories\FilterChain\Link\FilterQueryLink;
use Illuminate\Database\Eloquent\Builder;

class FilterByOwner extends FilterQueryLink
{
    public function handle(Builder $modelQueryBuilder, object $dto = null): Builder
    {
        if ($dto->getOwnerName() != null) {
            $builder = $modelQueryBuilder->whereHas('owner', function (Builder $query) use ($dto) {
                $query->where('name', $dto->getOwnerName());
            });
            return parent::handle($builder, $dto);
        }
        return parent::handle($modelQueryBuilder, $dto);
    }
}
