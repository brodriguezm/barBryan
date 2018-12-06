<?php

namespace AppBundle\Controller;

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
        // replace this example code with whatever you need
        return $this->render('bar/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request){
        $saludo = "Hola desde nosotros";
        return $this->render('bar/nosotros.html.twig');
    }

    /**
     * @Route("/ubicacion", name="ubicacion")
     */
    public function ubicacionAction(Request $request){
        $saludo = "Hola desde nosotros";
        return $this->render('bar/ubicacion.html.twig', array("saludo"=>$saludo));
    }
}
