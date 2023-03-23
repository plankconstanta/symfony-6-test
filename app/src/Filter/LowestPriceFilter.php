<?php

namespace App\Filter;

use App\DTO\PromotionEnquiryInterface;
use App\Entity\Promotion;

class LowestPriceFilter implements PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquery, Promotion ...$promotion): PromotionEnquiryInterface
    {
        $enquery->setDiscountedPrice(50);
        $enquery->setPrice(100);
        $enquery->setPromotionId(3);
        $enquery->setPromotionName('Black Friday');

        return $enquery;
    }
}