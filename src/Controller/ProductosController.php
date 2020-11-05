<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Repository\ProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ProductosController extends AbstractController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/productos", name="productos")
     */
    public function index(Request $request, ProductoRepository $productoRepository): Response
    {

        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $productoRepository->getProductoPaginador($offset);

        return new Response($this->twig->render('productos/index.html.twig', [
            'productos' => $paginator,
            'previous' => $offset - ProductoRepository::PAGINADOR_POR_PAGINA,
            'next' => min(count($paginator), $offset + ProductoRepository::PAGINADOR_POR_PAGINA),
        ]));
    }

    /**
     * @Route("/producto/{id}", name="producto")
     */
    public function show( $id, ProductoRepository $productoRepository)
    {
        return new Response($this->twig->render('productos/show.html.twig', [
            'producto' => $productoRepository->find($id),
        ]));
    }
}
