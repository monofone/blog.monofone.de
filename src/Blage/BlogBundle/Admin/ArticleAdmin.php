<?php

namespace Blage\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

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
                
        ->end()
        ->with('Author')
                ->add('author', 'sonata_type_model')
        ->end();
    }
    
    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
                ->add('createdAt')
                ->add('updatedAt')
                ->add('id')
                ;
    }
    
}
