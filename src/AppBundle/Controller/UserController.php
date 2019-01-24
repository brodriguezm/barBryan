<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/usuario")
 */

class UserController extends Controller
{
    /**
     * @Route("/nuevo-usuario", name="nuevo-usuario")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $usuario = new User();
        //Se crea el formulario
        $form = $this->createForm(UserType::class, $usuario);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            //Rellenamos el objeto Platillo
            $form = $form->getData();

            $usuario->setEmail($form->getEmail());
            $usuario->setUsername($form->getUsername());
            $password = $passwordEncoder->encodePassword($usuario, $form->getPlainPassword());
            $usuario->setPassword($password);

            //Se almacena el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('bar/registro.html.twig', array(
            'form'=> $form->createView()
        ));
    }
    
}