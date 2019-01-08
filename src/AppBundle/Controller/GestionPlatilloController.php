<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Platillo;
use AppBundle\Form\PlatilloType;
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
        $objPlatilo = new Platillo();
        //Se crea el formulario
        $form = $this->createForm(PlatilloType::class, $objPlatilo);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //Rellenamos el objeto Platillo
            $objPlatilo = $form->getData();
            dump($objPlatilo);die();
        }

        // replace this example code with whatever you need
        return $this->render('platillo/nuevoPlatillo.html.twig', array(
            "form" => $form->createView()
        ));
    }
}