<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{


    /**
     * @Route("/page/{id}", requirements={"id"="[0-9]+"},methods={"GET"})
     * @param int|null $id
     * @return JsonResponse
     */
    public function page(?int $id = null):JsonResponse
    {
        //var_dump($id);
        $products = [
            "foo" => 1,
            "bar" => "foo",
        ];
        return $this->json($products);
        //return $this->render('blog.html.twig');
    }

    public function page2(?int $id = null): Response
    {
        var_dump($id);
        return $this->render('blog.html.twig');
    }


}