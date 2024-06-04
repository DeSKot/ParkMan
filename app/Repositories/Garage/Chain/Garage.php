<?php

namespace App\Repositories\Garage\Chain;

use App\Repositories\FilterChain\Chain\FilterQueryChain;
use App\Repositories\FilterChain\Link\FilterQueryLinkInterface;
use App\Repositories\Garage\Link\FilterByCountry;
use App\Repositories\Garage\Link\FilterByLongitudeAndLatitude;
use App\Repositories\Garage\Link\FilterByOwner;

class Garage extends FilterQueryChain
{

    protected function setChain(): FilterQueryLinkInterface
    {
        $chain = new FilterByCountry();

        $chain->setNext(new FilterByOwner())
            ->setNext(new FilterByLongitudeAndLatitude());

        return $chain;
    }
}
