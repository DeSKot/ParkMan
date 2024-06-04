<?php

namespace App\Repositories\FilterChain\Link;

use Illuminate\Database\Eloquent\Builder;

abstract class FilterQueryLink implements FilterQueryLinkInterface
{

    private FilterQueryLinkInterface|null $nextHandler = null;

    public function setNext(FilterQueryLinkInterface $handler): FilterQueryLinkInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(Builder $modelQueryBuilder, object $dto = null): Builder
    {
        if($this->nextHandler) {
            return $this->nextHandler->handle($modelQueryBuilder, $dto);
        }
        return $modelQueryBuilder;
    }
}
