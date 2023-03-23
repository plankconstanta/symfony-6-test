<?php

namespace App\Controller;

use App\DTO\LowestPriceEnquiry;
use App\Filter\LowestPriceFilter;
use App\Filter\PromotionFilterInterface;
use App\Service\Serializer\DTOSerializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductsController extends AbstractController
{
    #[Route('/products/{id}/lowest-price', name: 'lowest-price', methods: ['POST'])]
    public function lowestPrice(int $id, Request $request, DTOSerializer $serializer, LowestPriceFilter $promotionFilter): Response
    {
        /** @var LowestPriceEnquiry $lowestPriceEnquiry */
        $lowestPriceEnquiry = $serializer->deserialize(
            $request->getContent(), LowestPriceEnquiry::class, 'json'
        );
        // change income data
        $modifiedEnquery = $promotionFilter->apply($lowestPriceEnquiry);

        // return changed data
        $responceContent = $serializer->serialize($modifiedEnquery, 'json');
        $responce = new Response(content: $responceContent, status: Response::HTTP_OK);

        return $responce;
    }

    #[Route('/products/{id}/promotions', name: 'promotions', methods: ['GET'])]
    public function promotions(int $id): Response
    {
        dd(__LINE__);
    }
}
