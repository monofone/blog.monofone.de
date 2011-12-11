<?php
namespace Blage\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
/**
 * Description of AuthorAdmin
 *
 * @author srohweder
 */
class AuthorAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('General')
                ->add('username', null, array('required' => true))
                ->add('email', null, array('required' => true))
                ->add('firstName', null, array('required' => true))
                ->add('lastName', null, array('required' => true))
                ->end()
        ;
    }
    
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ->add('id')
        ->add('username')
                ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('firstName')
            ->add('lastName')
            ->add('email');
    }
}
