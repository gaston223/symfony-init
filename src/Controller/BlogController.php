<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{


    /**
     * @Route("/page/{id}", requirements={"id"="[0-9]+"},methods={"GET"})
     * @param int|null $id
     * @return JsonResponse
     */
    public function displayJson(?int $id = null):JsonResponse
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

    /**
     * @Route("/support")
     * @return BinaryFileResponse
     */
    public function displayPdf():BinaryFileResponse
    {
        return $this->file(
            'pdf/planning.pdf',
            null,
            ResponseHeaderBag::DISPOSITION_INLINE
        );
    }


    /**
     * @Route("/redirige-moi")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirection():RedirectResponse
    {
        return $this->redirectToRoute('app_homepage');
        //return $this->redirect('https://www.ecosia.org'); Route avec redirection externe
        //return $this->redirectToRoute('app_blog_page',['id'=>67]); Route avec redirection interne avec Id
    }


    /**
     * @Route("/formulaire/affichage")
     */
    public function displayForm(): Response
    {
        return $this->render('form/index.html.twig');
    }

    /**
     * @Route("/formulaire/traitement", name="form_handler")
     * @param Request $request
     * @param SessionInterface $session
     */
    public function handleForm(Request $request, SessionInterface $session)
    {
        var_dump($session);
        $posts = $request->request;
        var_dump($posts);
        var_dump("Le formulaire a été soumis");
        die('debug');
    }
}
