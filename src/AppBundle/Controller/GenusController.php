<?php
/**
 * Created by PhpStorm.
 * User: JeffreyAllen
 * Date: 2/13/2018
 * Time: 8:23 AM
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName)
    {
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->connect();
        $connected = $em->getConnection()->isConnected();

        if ($connected){
            $notes = [
                'Octopus asked me a riddle, outsmarted me',
                'I counted 8 legs as they wrapped around me',
                'OCTOOOOOOOOOOOOOOOOOOOO! db is connected'
            ];
        } else {
            $notes = [
                'This database',
                'aint',
                'connected'
            ];
        }

        $html = $this->renderView('genus/show_json.html.twig', [
            'name' => $genusName,
            'notes' => $notes
        ]);

        return new Response($html);
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction()
    {
        $data = [
            ['id' => 1, 'username' => 'AquaMan'],
            ['id' => 2, 'username' => 'SeaMan'],
            ['id' => 3, 'username' => 'BlankMan']
        ];

        return new JsonResponse($data);
    }
}