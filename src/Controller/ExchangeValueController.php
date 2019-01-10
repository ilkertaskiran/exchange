<?php

namespace App\Controller;

use App\Entity\ExchangeValue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ExchangeValueController extends AbstractController
{
    /**
     * @Route("/exchange_value", name="exchange_value")
     */
    public function index($eur,$usd,$gbp)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $exchangeValue = new ExchangeValue();
        $exchangeValue->setEur($eur);
        $exchangeValue->setUsd($usd);
        $exchangeValue->setGbp($gbp);

        $entityManager->persist($exchangeValue);

        $entityManager->flush();

        return new Response('Added row id: '.$exchangeValue->getId());
    }

    /**
     * @Route("/exchange_value/{id}", name="exchange_value_show")
     */
    public function getLast()
    {
        $repository = $this->getDoctrine()->getRepository(ExchangeValue::class);
        $exchangeValue = $this->getDoctrine()
            ->getRepository(ExchangeValue::class)
            ->findBy(array(),array("id" => "DESC"),1);

        if (!$exchangeValue) {
            throw $this->createNotFoundException(
                'No Data '
            );
        }
        $lastRow = $repository->findBy(array(),array("id" => "DESC"),1);
        //print_r($lastRow);

        return $lastRow;
    }

    public function addByParams($eur=0,$usd=0,$gbp=0){
        if($eur == 0 || $usd == 0 || $gbp == 0) return false;
        $this->index($eur,$usd,$gbp);
        return 1;

    }
}
