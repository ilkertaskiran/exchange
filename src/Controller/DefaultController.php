<?php

namespace App\Controller;

use App\Entity\ExchangeValue;
use App\Repository\ExchangeValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        include_once "AdapterController.php";
        $adapter = new AdapterController();
        $result = $adapter->getCleanData();
        return $this->render('default/default.html.twig', [
            "eur" => $result['eur'],
            "usd" => $result['usd'],
            "gbp" => $result['gbp'],
        ]);
    }
}
