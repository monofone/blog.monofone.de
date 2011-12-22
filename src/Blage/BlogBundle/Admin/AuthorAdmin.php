<?php
namespace Blage\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use FOS\UserBundle\Model\UserManagerInterface;
/**
 * Description of AuthorAdmin
 *
 * @author srohweder
 */
class AuthorAdmin extends Admin
{
    
    protected $userManager;
    
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('General')
                ->add('username', null, array('required' => true))
                ->add('email', null, array('required' => true))
                ->add('firstName', null, array('required' => true))
                ->add('lastName', null, array('required' => true))
                ->end()
                ->with('Password')
                ->add('plainPassword', 'password', array('required' => false))
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
    
    public function preUpdate($object)
    {
        parent::preUpdate($object);
        $this->getUserManager()->updateCanonicalFields($object);
        $this->getUserManager()->updatePassword($object);
    }
    
    protected function getUserManager()
    {
        return $this->userManager;
    }
    
    public function setUserManager(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }
}
