<?php
/**
 * Created by PhpStorm.
 * User: Gaoussou
 * Date: 02/04/2019
 * Time: 15:53
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="app_session")
     * @param SessionInterface $session
     * @return Response
     */
    public function ajoutSession(SessionInterface $session):Response
    {
        //Ajout dans la session
        $ancienneValeur = $session->get('nbArticles', 0);
        $prix=$session->get('prix', 95);
        $session->set('nbArticles', $ancienneValeur + 1);
        $nouvelleValeur=$session->get('nbArticles');
        $session->set('nouveauPrix', $nouvelleValeur*$prix);
        //$session->set('prix',$prix);
        //var_dump($session->all());
        //die("debug session");


        //Redirection
        return $this->redirectToRoute('app_homepage');
    }

    /**
     * @Route("/panier", name="app_panier")
     * @param SessionInterface $session
     * @return Response
     */
    public function panier(SessionInterface $session):Response
    {
        $prix=$session->get('prix');
        $nouveauPrix=$session->get('nouveauPrix');
        $nbArticles = $session->get('nbArticles', 0);
        return $this->render('panier.html.twig', [
            'nbArticles' => $nbArticles,
            'nouveauPrix'=>$nouveauPrix,
            'prix'=>$prix
        ]);
    }
}
