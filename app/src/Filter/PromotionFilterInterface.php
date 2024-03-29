<?php
namespace App\Filter;

use App\DTO\PromotionEnquiryInterface;
use App\Entity\Promotion;

interface PromotionFilterInterface
{
    public function apply(PromotionEnquiryInterface $enquery, Promotion ...$promotion): PromotionEnquiryInterface;
}