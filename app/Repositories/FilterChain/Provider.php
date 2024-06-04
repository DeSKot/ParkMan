<?php

namespace App\Repositories\FilterChain;

use App\Models\GaragesGeneral;
use App\Repositories\FilterChain\Chain\FilterQueryChain;
use App\Repositories\Garage\Chain\Garage;

class Provider implements FilterChainRepositoryProviderInterface
{
    public function selectChain(string $chainKey, object $dto): FilterQueryChain
    {
        return match ($chainKey) {
            self::GARAGE_FILTER_CHAIN_KEY => new Garage(
                GaragesGeneral::query()
                    ->select([
                        'garages_owner.id as owner_id',
                        'garages_owner.name as garage_owner',
                        'garages_owner.email as contact_email',
                        'garages_general.*',
                        'garages_general.id as garage_id'
                    ])
                    ->join('garages_owner', 'garages_owner.id', '=', 'garages_general.owner_id'), $dto
            )
        };
    }
}
