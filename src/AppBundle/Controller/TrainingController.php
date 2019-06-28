<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Training;
use AppBundle\Form\TrainingType;
use Symfony\Component\HttpFoundation\Response;
/**
 * @Route("/plan")
 *
 */
class TrainingController extends Controller
{


    /**
     * @Route("/create_training/", name="create_training", methods="GET")
     * @Route("/create_training/", name="new_training", methods="POST")
     * @Template("training/training.html.twig")
     */
    public function createTrainingAction(Request $request )
    {
        if ($request->isMethod('GET')) {
            $newTraining = new Training();
            $form = $this->createForm(TrainingType::class, $newTraining, [
                'action' => $this->generateUrl('create_training')
            ]);
            return ['form' => $form->createView()];
        }
        $createTraining = new Training();
        $form = $this->createForm(TrainingType::class, $createTraining);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $createTraining = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($createTraining);
            $em->flush();
        }
        return $this->redirectToRoute('training_list');

    }

    /**
     * @Route("/training_list", name="training_list", methods="GET")
     * @Template("training/training_list.html.twig")
     */
    public function showTrainingAction(Request $request)
    {
        {
        $entityManager = $this->getDoctrine()->getManager();
        $TrainingRepository = $entityManager->getRepository('AppBundle:Training');
        $training = $TrainingRepository->findAll();
        return['name' => $training];

        }

    }

}
