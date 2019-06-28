<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Exercise;
use AppBundle\Form\ExerciseType;
use AppBundle\Entity\Training;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @Route("plan/")
 *
 */
class ExerciseController extends Controller
{    /**
 * @Route("create-exercise/", name="create_exercise", methods="GET")
 * @Route("create-exercise/", name="new_exercise", methods="POST")
 * @Template("exercise/create_exercise.html.twig")
 */
    public function createTrainingAction(Request $request )
    {
        if ($request->isMethod('GET')) {
            $newExercise = new Exercise();
            $form = $this->createForm(ExerciseType::class, $newExercise, [
                'action' => $this->generateUrl('create_exercise')
            ]);
            return ['form' => $form->createView()];
        }
        $createExercise = new Exercise();
        $form = $this->createForm(ExerciseType::class, $createExercise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $createExercise = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($createExercise);
            $em->flush();
        }
        return $this->redirectToRoute('exercise_list');

    }

    /**
     * @Route("exercise_list", name="exercise_list")
     * @Template("exercise/exercise_list.html.twig")
     */
    public function showExerciseAction(Request $request)
    {
        {
            $entityManager = $this->getDoctrine()->getManager();
            $ExerciseRepository = $entityManager->getRepository('AppBundle:Exercise');
            $exercise = $ExerciseRepository->findAll();
            return['name' => $exercise];

        }

    }

    /**
     * @Route("exercise_details", name="exercise_details")
     * @Template("exercise/exercise_details.html.twig")
     */
    public function detailsExerciseAction(Request $request)
    {
        {
            $entityManager = $this->getDoctrine()->getManager();
            $ExerciseRepository = $entityManager->getRepository('AppBundle:Exercise');
            $exercise = $ExerciseRepository->findAll();
            return['name' => $exercise];

        }

    }

}
