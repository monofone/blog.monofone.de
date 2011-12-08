<?php

namespace Blage\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $articles = $this->getDoctrine()
                ->getRepository('BlageBlogBundle:Article')
                ->findLatest();
                
        return array('articles'=>$articles);
    }
}
