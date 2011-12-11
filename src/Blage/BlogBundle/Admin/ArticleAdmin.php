<?php

namespace Blage\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

/**
 * Description of ArticleAdmin
 *
 * @author srohweder
 */
class ArticleAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('General')
                ->add('title')
                ->add('category', 'sonata_type_model')
                ->add('content')
                ->add('online', null, array('required' => false))
                
        ->end()
        ->with('Author')
                ->add('author', 'sonata_type_model')
        ->end();
    }
    
    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
                ->add('online', null, array('editable' => true))
                ->add('createdAt')
                ->add('updatedAt')
                ->add('id')
                ->add('_action','actions', array(
                    'actions' => array(
                        'review' =>array('template' => 'BlageBlogBundle:Admin:list__action_review.html.twig')
                    )
                ))
                ;
    }
    
    public function configureRoutes(RouteCollection $collection)
    {
        $collection->add('review', $this->getRouterIdParameter().'/review');
    }
    
}
