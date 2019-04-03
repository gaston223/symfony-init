<?php
/**
 * Created by PhpStorm.
 * User: Gaoussou
 * Date: 01/04/2019
 * Time: 14:17
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    /**
     *
     * @return Response
     */
    public function home():Response
    {
        return $this->render('home.html.twig');
    }

    /***
     * @return Response
     * @Route("/contact")
     */
    public function contact():Response
    {
        return new Response(
            '<h1>Contact</h1>'
        );
    }
}
