<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Data;
use AppBundle\Entity\DataMyisam;
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
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Simple doctrine use, no sql transaction
     *
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
    /**
     * Simple doctrine use, no sql transaction, MyISAM table engine
     *
     * @Route("/doctrineMyisam", name="doctrineMyisam")
     */
    public function doctrineMyisamAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = new DataMyisam();
        $data->setDescription($this->getData());
        $em->persist($data);
        $em->flush();

        return new JsonResponse();
    }

    /**
     * Simple doctrine use with sql transaction
     *
     * @Route("/doctrineTransaction", name="doctrineTransaction")
     */
    public function doctrineTransactionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = new Data();
        $data->setDescription($this->getData());

        $em->getConnection()->beginTransaction();
        $em->persist($data);
        $em->flush();
        $em->getConnection()->commit();

        return new JsonResponse();
    }

    /**
     * Simple rabbitmq message publish
     *
     * @Route("/rabbitmq", name="rabbitmq")
     */
    public function rabbitmqAction()
    {
        $this->get("old_sound_rabbit_mq.api_call_producer")->publish($this->getData());
//        $this->get("old_sound_rabbit_mq.api_call_transient_producer")->publish($this->getData());
        return new JsonResponse();
    }

    /**
     * Test data.
     *
     * @return string
     */
    private function getData()
    {
        $datetime = new \DateTime();
        return serialize(
            [
                'id' => random_int(1, PHP_INT_MAX),
                'desc' => 'Lorem ipsum',
                'datetime' => $datetime->format('Y-m-d H:i:s')
            ]
        );
    }
}
