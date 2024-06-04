<?php

namespace App\Repositories\FilterChain\Link;

use Illuminate\Database\Eloquent\Builder;

interface FilterQueryLinkInterface
{
    public function setNext(FilterQueryLinkInterface $handler): FilterQueryLinkInterface;

    public function handle(Builder $modelQueryBuilder, object $dto = null): Builder;
}
