<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Platillo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
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

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request){
        $saludo = "Hola desde nosotros";
        return $this->render('bar/nosotros.html.twig');
    }

    /**
     * @Route("/ubicacion/{id}", name="ubicacion")
     */
    public function ubicacionAction(Request $request, $id="todos"){
        $saludo = "Hola desde nosotros";
        return $this->render('bar/ubicacion.html.twig', array("idLocalidad"=>$id));
    }
}
