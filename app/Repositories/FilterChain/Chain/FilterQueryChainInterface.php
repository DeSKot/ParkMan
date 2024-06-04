<?php

namespace App\Repositories\FilterChain\Chain;

use Illuminate\Database\Eloquent\Collection;

interface FilterQueryChainInterface
{
    public function execute(): Collection;
}
