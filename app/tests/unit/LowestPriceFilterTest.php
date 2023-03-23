<?php

namespace App\Tests\unit;

use App\Filter\LowestPriceFilter;
use App\Tests\ServiceTestCase;

class LowestPriceFilterTest extends ServiceTestCase
{
    /** @test */
    public function lowest_price_promotions_filtering_is_applied_correctly(): void
    {

        $lowestPriceFilter = $this->mycontainer->get(LowestPriceFilter::class);

        dd($lowestPriceFilter);

        $filteredEnquiry = $lowestPriceFilter->apply($enquiry, ...$promotions);


    }
}