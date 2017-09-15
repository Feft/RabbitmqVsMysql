<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Data;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/doctrine", name="doctrine")
     */
    public function doctrineAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = new Data();
        $data->setDescription($this->getData());
        $em->persist($data);
        $em->flush();

        return new JsonResponse();
    }

    private function getData()
    {
        $datetime = new \DateTime();
        return serialize(
            [
                'id' => random_int(1,PHP_INT_MAX),
                'desc' => 'Lorem ipsum',
                'datetime' => $datetime->format('Y-m-d H:i:s')
            ]
        );
    }
}
