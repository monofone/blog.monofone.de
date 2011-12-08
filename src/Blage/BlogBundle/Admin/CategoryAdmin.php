<?php

namespace Blage\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Description of CategoryAdmin
 *
 * @author srohweder
 */
class CategoryAdmin extends Admin
{

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('General')
                ->add('name', null, array('required' => true))
                ->end()
        ;
    }
    
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ->add('id')
        ->add('name')
                ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name');
    }
}
