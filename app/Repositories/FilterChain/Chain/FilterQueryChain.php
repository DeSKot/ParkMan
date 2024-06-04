<?php

namespace App\Repositories\FilterChain\Chain;

use App\Repositories\FilterChain\Link\FilterQueryLinkInterface;
use App\Trait\Pagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class FilterQueryChain implements FilterQueryChainInterface
{
    use Pagination;

    public function __construct(
        protected Builder $modelQuery,
        protected object $dto,
    ) {
        $this->chainOfResponsibility = $this->setChain();
    }

    protected FilterQueryLinkInterface $chainOfResponsibility;

    abstract protected function setChain(): FilterQueryLinkInterface;

    public function execute(): Collection
    {
        return $this->chainOfResponsibility->handle($this->modelQuery, $this->dto)->get();
    }

}
