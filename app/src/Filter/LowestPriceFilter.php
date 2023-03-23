<?php

namespace App\Filter;

use App\DTO\PromotionEnquiryInterface;

class LowestPriceFilter implements PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquery): PromotionEnquiryInterface
    {
        $enquery->setDiscountedPrice(50);
        $enquery->setPrice(100);
        $enquery->setPromotionId(3);
        $enquery->setPromotionName('Black Friday');

        return $enquery;
    }
}