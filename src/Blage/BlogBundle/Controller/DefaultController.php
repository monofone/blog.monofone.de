<?php

namespace Blage\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    /**
     * @Route("/article/{year}/{month}/{slug}")
     * @Template()
     */
 public function articleAction($year, $month, $slug)
 {
     $article = $this->getDoctrine()
                ->getRepository('BlageBlogBundle:Article')
                ->findOneBySlug($slug);
     
     if(!$article){
         throw new NotFoundHttpException(sprintf("article with slug %s not found", $slug));
     }
     
     return array('article' => $article);
 }
}
