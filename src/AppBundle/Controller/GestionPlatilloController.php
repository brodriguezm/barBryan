<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Platillo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/platillo")
 */

class GestionPlatilloController extends Controller
{
    /**
     * @Route("/nuevo-platillo", name="nuevo-platillo")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Platillo::class);
        $platillos = $repository->findAll();

        // replace this example code with whatever you need
        return $this->render('bar/index.html.twig', array(
            "platillos" => $platillos
        ));
    }
}