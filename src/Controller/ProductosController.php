<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Form\ProductoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductosController extends AbstractController
{
    /**
     * @Route("/productos", name="productos")
     */
    public function index( Request $request ): Response
    {
        
        $producto = new Producto();
        $form = $this->createForm(ProductoType:: class, $producto);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $producto = $form->getData();
            $em->persist($producto);
            $em->flush();
            return $this->redirectToRoute('productos');
        }

        return $this->render('productos/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
