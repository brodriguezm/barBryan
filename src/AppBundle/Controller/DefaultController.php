<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Platillo;
use AppBundle\Entity\Categoria;
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
        //$platillos = $repository->findAll();
        $platillos = $repository->findByTop(1);

        // replace this example code with whatever you need
        return $this->render('bar/index.html.twig', array(
            "platillos" => $platillos
        ));
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request){

        return $this->render('bar/nosotros.html.twig');
    }

    /**
     * @Route("/ubicacion/{id}", name="ubicacion")
     */
    public function ubicacionAction(Request $request, $id="todos"){

        return $this->render('bar/ubicacion.html.twig', array("idLocalidad"=>$id));
    }

    /**
     * @Route("/platillos/{id}", name="platillos")
     */
    public function platillosAction(Request $request, $id="todos"){
        $repository = $this->getDoctrine()->getRepository(Platillo::class);
        $platillos = $repository->findAll();

        $objPlatillo = new Platillo();

        foreach($platillos as $platillo){
            //Si no se consulto un platillo en especifico se setea el primero de la lista
            if($id == "todos"){
                $id = $platillo->getId();
            }

            if($platillo->getId() == $id){
                $objPlatillo->setNombre($platillo->getNombre());
                $objPlatillo->setDescripcion($platillo->getDescripcion());
                $objPlatillo->setIngredientes($platillo->getIngredientes());
                $objPlatillo->setFoto($platillo->getFoto());
                $objPlatillo->setTop($platillo->getTop());
                break;
            }
        }

        return $this->render('bar/tapa.html.twig', array(
            "id" => $id,
            "platillo" => $objPlatillo,
            "listaPlatillos" => $platillos
        ));
    }

    /**
     * @Route("/categorias", name="categorias")
     */
    public function categoriasAction(Request $request){
        $repository = $this->getDoctrine()->getRepository(Categoria::class);
        $categorias = $repository->findAll();

        return $this->render('categoria/index.html.twig', array(
            "categoria" => $categorias
        ));
    }
}
