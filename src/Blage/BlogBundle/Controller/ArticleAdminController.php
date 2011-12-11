<?php

namespace Blage\BlogBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Description of ArticleAdminController
 *
 * @author srohweder
 */
class ArticleAdminController extends Controller
{

    public function reviewAction($id)
    {
        $article = $this->getDoctrine()
                ->getRepository('BlageBlogBundle:Article')
                ->findOneById($id);
        if (!$article) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }
        
        $content = $this->renderView('BlageBlogBundle:Admin:review_mail.html.twig',array(
            'url' => 'http://'.$_SERVER['SERVER_NAME'].$this->admin->generateUrl('edit',array('id' => $id))
        ));
        
        $message = \Swift_Message::newInstance()
                ->setSubject('Bitte einmal draufschauen "'.$article->getTitle().'"')
                ->setFrom('blog@monofone.de')
                ->setTo('mareike-pieper@gmx.de')
                ->setBody($content);
        
        $this->get('mailer')->send($message);
        
        $url = $this->admin->generateUrl('list');

        return new RedirectResponse($url);
    }

}
