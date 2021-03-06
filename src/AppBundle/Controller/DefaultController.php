<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingrediente;
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
        //$platillos = $repository->findByTop(1);

        $query = $repository->createQueryBuilder('t')
            ->where('t.top = 1')
            ->setFirstResult(0)
            ->setMaxResults(2)
            ->getQuery();

        $platillos = $query->getResult();

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
                $objPlatillo = $repository->find($id);
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

        //dump($categorias);die();

        return $this->render('categoria/index.html.twig', array(
            "categoria" => $categorias[0]
        ));
    }

    /**
     * @Route("/ingredientes", name="ingredientes")
     */
    public function ingredientesAction(Request $request){
        $repository = $this->getDoctrine()->getRepository(Ingrediente::class);
        $ingredientes = $repository->findAll();

        return $this->render('ingrediente/ing-index.html.twig', array(
            "ingredientes" => $ingredientes
        ));
    }
}
