<?php

namespace App\Controller;

use App\Entity\Almacen;
use App\Form\AlmacenType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AlmacenController extends AbstractController
{
    /**
     * @Route("/almacen", name="almacen")
     */
    public function index( Request $request ): Response
    {
        $almacen = new Almacen();
        $form = $this->createForm(AlmacenType:: class, $almacen);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $almacen = $form->getData();
            $em->persist($almacen);
            $em->flush();
            return $this->redirectToRoute('almacen');
        }

        return $this->render('almacen/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
