<?php

namespace App\Repositories\FilterChain;

use App\Repositories\FilterChain\Chain\FilterQueryChain;

interface FilterChainRepositoryProviderInterface
{
    const GARAGE_FILTER_CHAIN_KEY = 'garages';

    public function selectChain(string $chainKey, object $dto): FilterQueryChain;
}
