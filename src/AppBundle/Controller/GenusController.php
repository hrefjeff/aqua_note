<?php
/**
 * Created by PhpStorm.
 * User: JeffreyAllen
 * Date: 2/13/2018
 * Time: 8:23 AM
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
        $html = $this->render('genus/show.html.twig', [
            'name' => $genusName
        ]);

        return new Response($html);
    }
}