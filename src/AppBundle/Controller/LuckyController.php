<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class LuckyController extends Controller
{

	/**
    *Route("/lucky/number")
    */

    public function indexAction()
{

	return $this->render('/lucky/bases.html.twig');
}
}