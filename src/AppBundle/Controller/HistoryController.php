<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HistoryController
 * @Route("/plan")
 */

class HistoryController extends Controller
{
    /**
     * @Route("/history", name="history")
     */
    public function createPlanAction(Request $request)
    {
        return $this->render('history/history.html.twig');
    }
}
