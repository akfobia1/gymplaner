<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Plan;
use AppBundle\Form\PlanType;

/**
 * @Route("plan")
 */

class PlanController extends Controller
{
    /**
     * @Route("/create", name="create_plan",  methods="GET")
     * @Route("/create", name="new_plan", methods="POST")
     * @Template("plan/plan.html.twig")
     */
    public function createPlanAction(Request $request)
    {
        if ($request->isMethod('GET')) {
            $newPlan = new Plan();
            $form = $this->createForm(PlanType::class, $newPlan, [
                'action' => $this->generateUrl('create_plan')
            ]);
            return ['form' => $form->createView()];
        }
        $createPlan = new Plan();
        $form = $this->createForm(PlanType::class, $createPlan);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $createPlan = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($createPlan);
            $em->flush();
        }
        return $this->redirectToRoute('show_plans');

    }
    /**
     * @Route("/show-plans", name="show_plans")
     * @Template("plan/show_plan.html.twig")
     */
    public function showPlanAction(Request $request)
    {
        {
        $entityManager = $this->getDoctrine()->getManager();
        $planRepository = $entityManager->getRepository('AppBundle:Plan');
        $plan = $planRepository->findAll();
        return['name' => $plan];

        }
    }


}
